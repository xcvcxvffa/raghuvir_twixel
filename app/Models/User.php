<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'is_admin', 'avatar', 'phone'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin(): bool
    {
        return (bool) $this->is_admin || $this->role === 'admin';
    }

    /**
     * Get avatar URL if exists.
     */
    public function getAvatarUrl(): ?string
    {
        if (empty($this->avatar)) {
            return null;
        }

        // Normalize slashes (prevent backslash issues on Windows)
        $cleanPath = str_replace('\\', '/', $this->avatar);

        // Strip leading storage/ or /storage/ if present
        $cleanPath = preg_replace('#^/?storage/#', '', $cleanPath);
        $cleanPath = ltrim($cleanPath, '/');

        // Check file on public disk, storage_path, or public/storage
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($cleanPath) 
            || file_exists(storage_path('app/public/' . $cleanPath))
            || file_exists(public_path('storage/' . $cleanPath))) {
            return asset('media/' . $cleanPath);
        }

        return null;
    }
}
