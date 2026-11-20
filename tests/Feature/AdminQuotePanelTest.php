<?php

namespace Tests\Feature;

use App\Models\QuoteRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminQuotePanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config()->set('app.key', str_repeat('a', 32));
    }

    private function quote(): QuoteRequest
    {
        return QuoteRequest::create([
            'empresa' => 'Empresa de prueba',
            'nombre' => 'Ana Pérez',
            'email' => 'ana@example.com',
            'ubicacion' => 'San Salvador',
            'mensaje' => 'Necesitamos mejorar la red de nuestra oficina.',
            'categorias' => ['redes'],
        ]);
    }

    private function admin(): User
    {
        $admin = User::factory()->create(['password' => 'correct-password-123']);
        $admin->is_admin = true;
        $admin->save();

        return $admin;
    }

    public function test_guest_cannot_read_or_change_quotes(): void
    {
        $quote = $this->quote();

        $this->get(route('admin.index'))->assertRedirect(route('login'));
        $this->patch(route('admin.quotes.status', $quote), ['estado' => 'respondido'])
            ->assertRedirect(route('login'));
        $this->assertSame('nuevo', $quote->fresh()->estado);
    }

    public function test_admin_can_log_in_review_and_update_status(): void
    {
        $admin = $this->admin();
        $quote = $this->quote();

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'correct-password-123',
        ])->assertRedirect(route('admin.index'));

        $this->assertAuthenticatedAs($admin);
        $this->get(route('admin.index'))->assertOk()->assertSee('Empresa de prueba');
        $this->patch(route('admin.quotes.status', $quote), ['estado' => 'en_revision'])
            ->assertRedirect()
            ->assertSessionHas('status_updated', true);
        $this->assertSame('en_revision', $quote->fresh()->estado);

        $this->post(route('admin.logout'))->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_invalid_status_and_non_admin_access_are_rejected(): void
    {
        $quote = $this->quote();
        $admin = $this->admin();
        $this->actingAs($admin)
            ->patch(route('admin.quotes.status', $quote), ['estado' => 'cancelado'])
            ->assertSessionHasErrors(['estado']);
        $this->assertSame('nuevo', $quote->fresh()->estado);

        $normalUser = User::factory()->create();
        $this->actingAs($normalUser)->get(route('admin.index'))->assertForbidden();
        $this->actingAs($normalUser)
            ->patch(route('admin.quotes.status', $quote), ['estado' => 'respondido'])
            ->assertForbidden();
        $this->assertSame('nuevo', $quote->fresh()->estado);
    }

    public function test_non_admin_cannot_log_in_to_panel(): void
    {
        $user = User::factory()->create(['password' => 'correct-password-123']);

        $this->post(route('admin.login.store'), [
            'email' => $user->email,
            'password' => 'correct-password-123',
        ])->assertSessionHasErrors(['email']);

        $this->assertGuest();
    }

    public function test_interactive_command_creates_admin_without_default_credentials(): void
    {
        $this->artisan('admin:create')
            ->expectsQuestion('Nombre del administrador', 'Responsable comercial')
            ->expectsQuestion('Correo electrónico', 'ventas@example.com')
            ->expectsQuestion('Contraseña (mínimo 12 caracteres)', 'clave-de-prueba-123')
            ->expectsQuestion('Confirma la contraseña', 'clave-de-prueba-123')
            ->assertSuccessful();

        $admin = User::where('email', 'ventas@example.com')->firstOrFail();
        $this->assertTrue($admin->is_admin);
        $this->assertNotSame('clave-de-prueba-123', $admin->password);
    }
}
