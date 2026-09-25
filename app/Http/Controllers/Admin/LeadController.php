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
        $sortOrder = $request->input('sort', 'latest');
        $query = Lead::query();

        if ($sortOrder === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        // Search filter
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('product_interest', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%")
                    ->orWhere('notes', 'like', "%{$search}%");
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
     * Update lead status or admin notes (Supports both AJAX and standard form post).
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,closed',
            'notes'  => 'nullable|string|max:1000',
        ]);

        $lead->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status'  => $lead->status,
                'lead_id' => $lead->id,
                'message' => "Lead #{$lead->id} marked as " . ucfirst($lead->status) . '.',
            ]);
        }

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
     * Handle bulk batch operations (status changes or deletion).
     */
    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:mark_new,mark_contacted,mark_closed,delete',
            'ids'    => 'required|array',
            'ids.*'  => 'integer|exists:leads,id',
        ]);

        $action = $validated['action'];
        $ids    = $validated['ids'];
        $count  = count($ids);

        if ($action === 'delete') {
            Lead::whereIn('id', $ids)->delete();
            $message = "Successfully deleted {$count} selected inquiries.";
        } elseif ($action === 'mark_new') {
            Lead::whereIn('id', $ids)->update(['status' => 'new']);
            $message = "Marked {$count} inquiries as New.";
        } elseif ($action === 'mark_contacted') {
            Lead::whereIn('id', $ids)->update(['status' => 'contacted']);
            $message = "Marked {$count} inquiries as Contacted.";
        } elseif ($action === 'mark_closed') {
            Lead::whereIn('id', $ids)->update(['status' => 'closed']);
            $message = "Marked {$count} inquiries as Closed / Converted.";
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message ?? 'Bulk action executed successfully.',
            ]);
        }

        return redirect()->back()->with('success', $message ?? 'Bulk action executed.');
    }

    /**
     * Export all or filtered leads to CSV.
     */
    public function exportCsv(Request $request)
    {
        $query = Lead::query()->latest();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('product_interest', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            if ($status !== 'all') {
                $query->where('status', $status);
            }
        }

        if ($source = $request->input('source')) {
            if ($source !== 'all') {
                $query->where('source', $source);
            }
        }

        $leads = $query->get();
        $filename = 'customer_inquiries_' . date('Y-m-d_H-i') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($leads) {
            $file = fopen('php://output', 'w');

            // Neutralize formula injection triggers (=, +, -, @, tab, CR) for spreadsheet viewers
            $sanitizeCell = function ($val) {
                if ($val === null) {
                    return '';
                }
                $str = (string) $val;
                $trimmed = ltrim($str);
                if (strlen($trimmed) > 0 && in_array($trimmed[0], ['=', '+', '-', '@', "\t", "\r"])) {
                    return "'" . $str;
                }
                return $str;
            };

            // Write CSV headers
            fputcsv($file, [
                'Lead ID',
                'Customer Name',
                'Phone',
                'Email',
                'Product Interest',
                'Quantity',
                'Message',
                'Source',
                'Status',
                'Admin Notes',
                'Date Created',
            ]);

            foreach ($leads as $l) {
                fputcsv($file, [
                    $l->id,
                    $sanitizeCell($l->name),
                    $sanitizeCell($l->phone),
                    $sanitizeCell($l->email),
                    $sanitizeCell($l->product_interest ?: 'General Inquiry'),
                    $sanitizeCell($l->quantity ?: 'N/A'),
                    $sanitizeCell($l->message),
                    ($l->source === 'contact_page' || $l->source === 'contact_form') ? 'Contact Form' : (($l->source === 'product_inquiry_popup' || $l->source === 'product_inquiry') ? 'Product Inquiry' : 'Website Direct'),
                    ucfirst($l->status),
                    $sanitizeCell($l->notes ?: ''),
                    $l->created_at ? $l->created_at->format('Y-m-d H:i:s') : '',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
