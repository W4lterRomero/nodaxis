<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email:rfc', 'max:254'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'prohibited'],
        ]);

        NewsletterSubscriber::updateOrCreate(
            ['email' => mb_strtolower(trim($data['email']))],
            ['unsubscribed_at' => null],
        );

        return redirect()->to(route('home').'#boletin')->with('newsletter_success', true);
    }

    public function unsubscribe(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email:rfc', 'max:254'],
            'website' => ['nullable', 'prohibited'],
        ]);

        NewsletterSubscriber::where('email', mb_strtolower(trim($data['email'])))
            ->whereNull('unsubscribed_at')
            ->update(['unsubscribed_at' => now()]);

        return redirect()->to(route('terms').'#newsletter-unsubscribe')->with('unsubscribe_success', true);
    }
}
