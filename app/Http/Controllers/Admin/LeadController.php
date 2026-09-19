<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    /**
     * Display a listing of customer inquiries & leads.
     */
    public function index(Request $request): View
    {
        $query = Lead::query()->latest();

        // Search filter
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('product_interest', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($status = $request->input('status')) {
            if ($status !== 'all') {
                $query->where('status', $status);
            }
        }

        // Source filter
        if ($source = $request->input('source')) {
            if ($source !== 'all') {
                $query->where('source', $source);
            }
        }

        $leads = $query->paginate(15)->withQueryString();

        $totalCount = Lead::count();
        $newCount = Lead::where('status', 'new')->count();
        $contactedCount = Lead::where('status', 'contacted')->count();
        $closedCount = Lead::where('status', 'closed')->count();

        return view('admin.leads.index', compact(
            'leads',
            'totalCount',
            'newCount',
            'contactedCount',
            'closedCount'
        ));
    }

    /**
     * Update lead status or admin notes.
     */
    public function updateStatus(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,closed',
            'notes'  => 'nullable|string|max:1000',
        ]);

        $lead->update($validated);

        return redirect()->back()->with('success', "Lead #{$lead->id} status updated to " . ucfirst($lead->status) . '.');
    }

    /**
     * Save admin notes for a lead (AJAX-friendly, returns JSON).
     */
    public function updateNotes(Request $request, Lead $lead): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'notes' => 'nullable|string|max:1000',
        ]);

        $lead->update($validated);

        return response()->json(['ok' => true, 'notes' => $lead->notes]);
    }

    /**
     * Remove the specified lead.
     */
    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()->back()->with('success', 'Lead deleted successfully.');
    }
}
