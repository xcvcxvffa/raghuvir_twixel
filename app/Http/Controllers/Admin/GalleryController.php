<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Default categories for select dropdowns.
     */
    protected array $defaultCategories = [
        'Factory & Milling',
        'Wheat & Harvest',
        'Products',
        'Packaging & Storage',
        'Quality & Testing',
        'Recipes & Cooking',
    ];

    /**
     * Display a listing of gallery media with filters and KPI metrics.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        // 1. Keyword Search
        if ($request->filled('search')) {
            $query->search($request->input('search'));
        }

        // 2. Type Filter (all, image, video)
        if ($request->filled('type') && in_array($request->input('type'), ['image', 'video'])) {
            $query->where('type', $request->input('type'));
        }

        // 3. Category Filter
        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where('category', $request->input('category'));
        }

        // 4. Status Filter
        if ($request->filled('status')) {
            if ($request->input('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->input('status') === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Sorting & Pagination
        $items = $query->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        // KPI Summary Counters
        $totalCount = Gallery::count();
        $imagesCount = Gallery::where('type', 'image')->count();
        $videosCount = Gallery::where('type', 'video')->count();
        $activeCount = Gallery::where('is_active', true)->count();

        // Distinct categories for dropdown
        $existingCategories = Gallery::select('category')->distinct()->pluck('category')->filter()->values();
        $categories = $existingCategories->isNotEmpty()
            ? $existingCategories->merge($this->defaultCategories)->unique()->values()
            : collect($this->defaultCategories);

        return view('admin.galleries.index', compact(
            'items',
            'totalCount',
            'imagesCount',
            'videosCount',
            'activeCount',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        $categories = $this->defaultCategories;
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created gallery item in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'category' => 'nullable|string|max:100',
            'caption' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ];

        if ($request->input('type') === 'image') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp,svg|max:5120';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120';
            $rules['video_file'] = 'nullable|file|mimes:mp4,webm,ogg,mov,mkv|max:40960';
            $rules['video_url'] = 'nullable|string|max:500';
        }

        $validated = $request->validate($rules, [
            'image.required' => 'Please select and upload a photo/image file. Photos cannot be saved without an image.',
            'image.image' => 'The uploaded file must be a valid image file (JPG, PNG, WEBP, SVG).',
            'image.max' => 'The photo file size must not exceed 5MB.',
        ]);

        $videoUrl = null;
        if ($validated['type'] === 'video') {
            if ($request->hasFile('video_file')) {
                $videoUrl = $request->file('video_file')->store('gallery/videos', 'public');
            } elseif (!empty($validated['video_url'])) {
                $videoUrl = $validated['video_url'];
            } else {
                return back()->withInput()->withErrors(['video_file' => 'Please either upload a video file (MP4/WebM) or provide a valid YouTube URL.']);
            }
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'category' => $validated['category'] ?? 'General',
            'image' => $imagePath,
            'video_url' => $videoUrl,
            'caption' => $validated['caption'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item has been created successfully!');
    }

    /**
     * Show the form for editing the specified gallery item.
     */
    public function edit(Gallery $gallery)
    {
        $categories = $this->defaultCategories;
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified gallery item in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,webm,ogg,mov,mkv|max:40960',
            'video_url' => 'nullable|string|max:500',
            'caption' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validated['type'] === 'image' && empty($gallery->image) && !$request->hasFile('image')) {
            return back()->withInput()->withErrors(['image' => 'Please upload a photo/image file. Photos cannot be saved without an image.']);
        }

        $imagePath = $gallery->image;
        if ($request->hasFile('image')) {
            // Delete old file if stored in storage
            if (!empty($gallery->image) && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        $videoUrl = $gallery->getRawOriginal('video_url');
        if ($validated['type'] === 'video') {
            if ($request->hasFile('video_file')) {
                // Delete previous uploaded file if stored in storage
                if (!empty($videoUrl) && Storage::disk('public')->exists($videoUrl)) {
                    Storage::disk('public')->delete($videoUrl);
                }
                $videoUrl = $request->file('video_file')->store('gallery/videos', 'public');
            } elseif ($request->filled('video_url')) {
                // If user switched to an external URL, remove previous uploaded video file
                if (!empty($videoUrl) && Storage::disk('public')->exists($videoUrl)) {
                    Storage::disk('public')->delete($videoUrl);
                }
                $videoUrl = $request->input('video_url');
            }
        }

        $gallery->update([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'category' => $validated['category'] ?? 'General',
            'image' => $imagePath,
            'video_url' => $videoUrl,
            'caption' => $validated['caption'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item has been updated successfully!');
    }

    /**
     * Remove the specified gallery item from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if (!empty($gallery->image) && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $rawVideo = $gallery->getRawOriginal('video_url');
        if (!empty($rawVideo) && Storage::disk('public')->exists($rawVideo)) {
            Storage::disk('public')->delete($rawVideo);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item has been removed.');
    }

    /**
     * Toggle the visibility status of a gallery item.
     */
    public function toggleStatus(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        $statusText = $gallery->is_active ? 'activated' : 'hidden';

        if (request()->wantsJson()) {
            return response()->json([
                'success'   => true,
                'is_active' => $gallery->is_active,
                'message'   => "Media item is now {$statusText}.",
            ]);
        }

        return back()->with('success', "Media item is now {$statusText}.");
    }

    /**
     * Bulk actions on multiple gallery items (delete, publish, hide).
     */
    public function bulkAction(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'action' => 'required|in:delete,publish,hide',
            'ids'    => 'required|array|min:1',
            'ids.*'  => 'integer|exists:galleries,id',
        ]);

        $items  = Gallery::whereIn('id', $validated['ids'])->get();
        $count  = $items->count();

        match ($validated['action']) {
            'delete' => $items->each(function (Gallery $g) {
                if (!empty($g->image) && Storage::disk('public')->exists($g->image)) {
                    Storage::disk('public')->delete($g->image);
                }
                $g->delete();
            }),
            'publish' => Gallery::whereIn('id', $validated['ids'])->update(['is_active' => true]),
            'hide'    => Gallery::whereIn('id', $validated['ids'])->update(['is_active' => false]),
        };

        $label = match ($validated['action']) {
            'delete'  => "deleted",
            'publish' => "published",
            'hide'    => "hidden",
        };

        return response()->json([
            'success' => true,
            'count'   => $count,
            'action'  => $validated['action'],
            'message' => "{$count} item(s) {$label} successfully.",
        ]);
    }
}

