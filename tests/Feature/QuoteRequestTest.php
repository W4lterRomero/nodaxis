<?php

namespace Tests\Feature;

use App\Models\QuoteRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteRequestTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config()->set('app.key', str_repeat('a', 32));
    }

    private function validRequest(): array
    {
        return [
            'empresa' => 'Empresa de prueba',
            'nombre' => 'Ana Pérez',
            'email' => 'ana@example.com',
            'telefono' => '2222-2222',
            'ubicacion' => 'San Salvador',
            'mensaje' => 'Necesitamos mejorar la red de nuestra oficina.',
            'categorias' => ['redes', 'wifi'],
            'intereses' => ['switches', 'access-points'],
            'privacy_consent' => '1',
            'website' => '',
        ];
    }

    public function test_quote_request_is_persisted_and_confirmation_is_flashed(): void
    {
        $this->post(route('quotes.store'), $this->validRequest())
            ->assertRedirect(route('quotes.create'))
            ->assertSessionHas('quote_success', true);

        $this->assertDatabaseCount('quote_requests', 1);
        $this->assertSame(['redes', 'wifi'], QuoteRequest::firstOrFail()->categorias);
        $this->assertSame(['switches', 'access-points'], QuoteRequest::firstOrFail()->intereses);
    }

    public function test_required_fields_and_categories_are_validated(): void
    {
        $this->post(route('quotes.store'), [
            ...$this->validRequest(),
            'email' => 'invalid',
            'mensaje' => 'corto',
            'categorias' => ['desconocida'],
            'intereses' => ['inventado'],
        ])->assertSessionHasErrors(['email', 'mensaje', 'categorias.0', 'intereses.0']);

        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_honeypot_rejects_submission(): void
    {
        $this->post(route('quotes.store'), [
            ...$this->validRequest(),
            'website' => 'https://spam.example',
        ])->assertSessionHasErrors(['website']);

        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_catalog_interest_can_be_preselected_from_query_string(): void
    {
        $this->get(route('quotes.create', ['intereses' => 'switches']))
            ->assertOk()
            ->assertViewHas('selectedInterests', ['switches']);

        $this->get(route('quotes.create', ['intereses' => ['cableado', 'inventado']]))
            ->assertOk()
            ->assertViewHas('selectedInterests', ['cableado']);
    }

    public function test_new_catalog_families_are_accepted_in_a_quote(): void
    {
        $request = $this->validRequest();
        $request['intereses'] = ['enlaces-inalambricos', 'racks-gabinetes', 'energia-ups', 'fibra-optica'];

        $this->post(route('quotes.store'), $request)->assertRedirect(route('quotes.create'));
        $this->assertSame($request['intereses'], QuoteRequest::firstOrFail()->intereses);
    }

    public function test_sixth_submission_from_same_client_is_rate_limited(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('quotes.store'), $this->validRequest())->assertRedirect();
        }

        $this->post(route('quotes.store'), $this->validRequest())->assertStatus(429);
        $this->assertDatabaseCount('quote_requests', 5);
    }
}
