<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class QuoteDashboardController extends Controller
{
    private const STATUSES = ['nuevo', 'en_revision', 'respondido'];

    public function index(Request $request): View
    {
        $status = $request->query('estado');
        if (! in_array($status, self::STATUSES, true)) {
            $status = null;
        }

        $quotes = QuoteRequest::query()
            ->when($status, fn ($query) => $query->where('estado', $status))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.index', [
            'quotes' => $quotes,
            'selectedStatus' => $status,
            'statuses' => self::STATUSES,
        ]);
    }

    public function updateStatus(Request $request, QuoteRequest $quoteRequest): RedirectResponse
    {
        $data = $request->validate([
            'estado' => ['required', Rule::in(self::STATUSES)],
        ]);

        $quoteRequest->update($data);

        return back()->with('status_updated', true);
    }
}
