<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the site settings view.
     */
    public function index(): View
    {
        $settings = Setting::all()->keyBy('key');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // General
            'site_title' => 'required|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'site_favicon' => 'nullable|file|mimes:jpeg,png,jpg,webp,svg,ico|max:2048',

            // Contact
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:150',
            'whatsapp_number' => 'nullable|string|max:50',
            'company_address' => 'nullable|string|max:500',
            'working_hours' => 'nullable|string|max:255',
            'google_map_embed' => 'nullable|string|max:2000',

            // Social
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'whatsapp_url' => 'nullable|url|max:500',

            // Footer
            'footer_about' => 'nullable|string|max:1000',
            'copyright_text' => 'nullable|string|max:255',

            // SEO
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'custom_header_scripts' => 'nullable|string|max:10000',
        ]);

        // 1. Text & Textarea fields to update
        $textFields = [
            'site_title' => ['group' => 'general', 'type' => 'text'],
            'site_tagline' => ['group' => 'general', 'type' => 'text'],
            'contact_phone' => ['group' => 'contact', 'type' => 'text'],
            'contact_email' => ['group' => 'contact', 'type' => 'email'],
            'whatsapp_number' => ['group' => 'contact', 'type' => 'text'],
            'company_address' => ['group' => 'contact', 'type' => 'textarea'],
            'working_hours' => ['group' => 'contact', 'type' => 'text'],
            'google_map_embed' => ['group' => 'contact', 'type' => 'textarea'],
            'facebook_url' => ['group' => 'social', 'type' => 'url'],
            'instagram_url' => ['group' => 'social', 'type' => 'url'],
            'linkedin_url' => ['group' => 'social', 'type' => 'url'],
            'youtube_url' => ['group' => 'social', 'type' => 'url'],
            'twitter_url' => ['group' => 'social', 'type' => 'url'],
            'whatsapp_url' => ['group' => 'social', 'type' => 'url'],
            'footer_about' => ['group' => 'footer', 'type' => 'textarea'],
            'copyright_text' => ['group' => 'footer', 'type' => 'text'],
            'meta_title' => ['group' => 'seo', 'type' => 'text'],
            'meta_description' => ['group' => 'seo', 'type' => 'textarea'],
            'meta_keywords' => ['group' => 'seo', 'type' => 'textarea'],
            'custom_header_scripts' => ['group' => 'seo', 'type' => 'textarea'],
        ];

        foreach ($textFields as $key => $meta) {
            if ($request->has($key)) {
                $val = $request->input($key);
                if ($key === 'google_map_embed') {
                    $val = google_map_embed_url($val);
                }
                Setting::set($key, $val, $meta['group'], $meta['type']);
            }
        }

        // 2. File Uploads (Logos & Favicon)
        $fileFields = [
            'header_logo' => 'Header Brand Logo',
            'footer_logo' => 'Footer / Dark Logo',
            'site_favicon' => 'Site Favicon',
        ];

        foreach ($fileFields as $fileKey => $label) {
            // Check if user requested reset/deletion
            if ($request->boolean('remove_' . $fileKey)) {
                $oldVal = Setting::get($fileKey);
                if ($oldVal && str_starts_with($oldVal, 'storage/settings/')) {
                    $path = str_replace('storage/', '', $oldVal);
                    Storage::disk('public')->delete($path);
                }
                Setting::set($fileKey, '', 'general', 'image', $label);
            } elseif ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                if ($file->isValid()) {
                    // Delete old file if exists
                    $oldVal = Setting::get($fileKey);
                    if ($oldVal && str_starts_with($oldVal, 'storage/settings/')) {
                        $path = str_replace('storage/', '', $oldVal);
                        Storage::disk('public')->delete($path);
                    }

                    $ext = $file->getClientOriginalExtension();
                    $filename = $fileKey . '_' . time() . '.' . $ext;
                    $filePath = $file->storeAs('settings', $filename, 'public');

                    Setting::set($fileKey, 'storage/' . $filePath, 'general', 'image', $label);
                }
            }
        }

        // Flush settings cache so frontend picks up new values immediately
        Setting::clearCache();

        $activeTab = $request->input('active_tab', 'general');

        return redirect()->route('admin.settings.index', ['tab' => $activeTab])
            ->with('success', 'Site settings updated successfully.');
    }

    /**
     * Real-time resolver endpoint for Google Maps URLs (called asynchronously by admin UI).
     */
    public function resolveMap(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->input('url', '');
        $embedUrl = google_map_embed_url($input);

        return response()->json([
            'success' => true,
            'embed_url' => $embedUrl,
            'input' => $input,
        ]);
    }
}
