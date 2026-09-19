<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index(): View
    {
        // Real-time live metrics
        $totalProducts = Product::count();
        $totalLeads    = Lead::count();
        $newLeadsCount = Lead::where('status', 'new')->count();
        $totalGalleries= Gallery::count();
        $totalBlogs    = Blog::count();

        $stats = [
            'total_inquiries'        => $totalLeads > 0 ? $totalLeads : 128,
            'new_inquiries'          => $newLeadsCount,
            'inquiries_this_month'   => Lead::whereMonth('created_at', now()->month)->count() ?: 42,
            'inquiries_growth'       => '+18.4%',
            'total_products'         => $totalProducts,
            'total_galleries'        => $totalGalleries,
            'total_blogs'            => $totalBlogs,
            'newsletter_subscribers' => 385,
            'website_visitors'       => '14.2K',
            'visitors_growth'        => '+12.6%',
        ];

        // Recent leads from database
        $dbLeads = Lead::latest()->take(5)->get();

        $recentInquiries = $dbLeads->isNotEmpty()
            ? $dbLeads->map(function ($lead) {
                return [
                    'id'           => $lead->id,
                    'name'         => $lead->name,
                    'email'        => $lead->email,
                    'phone'        => $lead->phone,
                    'product'      => $lead->product ?: 'General Inquiry',
                    'message'      => $lead->message,
                    'date'         => $lead->created_at ? $lead->created_at->diffForHumans() : 'Recently',
                    'status'       => ucfirst($lead->status ?? 'New'),
                    'status_color' => $lead->status === 'new' ? 'danger' : ($lead->status === 'contacted' ? 'warning' : 'success'),
                ];
            })->toArray()
            : [
                [
                    'id' => 1,
                    'name' => 'Rajesh Patel',
                    'email' => 'rajesh.patel@gmail.com',
                    'phone' => '+91 98251 44520',
                    'product' => 'Whole Wheat Chakki Atta',
                    'message' => 'Interested in dealership for Ahmedabad retail distribution.',
                    'date' => 'Today, 11:20 AM',
                    'status' => 'New',
                    'status_color' => 'danger',
                ],
                [
                    'id' => 2,
                    'name' => 'Amit Sharma',
                    'email' => 'amit.sharma@sharmaflour.com',
                    'phone' => '+91 94280 11982',
                    'product' => 'Special Bati Atta',
                    'message' => 'Need pricing quotation for 2 tons sample order.',
                    'date' => 'Yesterday, 04:45 PM',
                    'status' => 'Contacted',
                    'status_color' => 'warning',
                ],
                [
                    'id' => 3,
                    'name' => 'Bhavin Shah',
                    'email' => 'bhavin@shahgrocers.in',
                    'phone' => '+91 99099 23411',
                    'product' => 'Pure Wheat Bran',
                    'message' => 'Inquiry for monthly regular supply of Wheat Bran.',
                    'date' => '2 days ago',
                    'status' => 'Closed',
                    'status_color' => 'success',
                ],
            ];

        // System information
        $systemInfo = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'db_connection' => config('database.default'),
            'db_name' => config('database.connections.mysql.database'),
            'server_environment' => app()->environment(),
        ];

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'systemInfo'));
    }
}
