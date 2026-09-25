<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the profile settings form.
     */
    public function edit(): View
    {
        $user = Auth::user() ?? \App\Models\User::first();

        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update basic personal information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone' => ['nullable', 'string', 'max:25'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->save();

        return back()->with('success', 'Personal information updated successfully.');
    }

    /**
     * Update account password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->numbers(),
            ],
        ], [
            'current_password.current_password' => 'The provided current password does not match our records.',
            'password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        \Illuminate\Support\Facades\Log::info('Security: Admin password updated successfully', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Security password updated successfully.');
    }

    /**
     * Upload or update profile avatar photo.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:10240'],
        ], [
            'avatar.required' => 'Please choose an image file to upload.',
            'avatar.image' => 'The uploaded file must be a valid image.',
            'avatar.mimes' => 'Avatar must be a file of type: jpeg, png, jpg, webp.',
            'avatar.max' => 'Avatar size should not exceed 10MB.',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if (!empty($user->avatar)) {
                $cleanOld = str_replace('\\', '/', $user->avatar);
                $cleanOld = preg_replace('#^/?storage/#', '', $cleanOld);
                $cleanOld = ltrim($cleanOld, '/');
                if (Storage::disk('public')->exists($cleanOld)) {
                    Storage::disk('public')->delete($cleanOld);
                }
            }

            // Store new avatar in public/avatars
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = str_replace('\\', '/', $path);
            $user->save();
        }

        return back()->with('success', 'Profile photo updated successfully.');
    }

    /**
     * Remove the current profile avatar photo.
     */
    public function removeAvatar(): RedirectResponse
    {
        $user = Auth::user();

        if (!empty($user->avatar)) {
            $cleanOld = str_replace('\\', '/', $user->avatar);
            $cleanOld = preg_replace('#^/?storage/#', '', $cleanOld);
            $cleanOld = ltrim($cleanOld, '/');
            if (Storage::disk('public')->exists($cleanOld)) {
                Storage::disk('public')->delete($cleanOld);
            }
        }

        $user->avatar = null;
        $user->save();

        return back()->with('info', 'Profile photo removed.');
    }
}
