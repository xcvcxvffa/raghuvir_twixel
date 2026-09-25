<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'title',
        'message',
        'url',
        'icon',
        'icon_color',
        'is_read',
        'related_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Scope to only unread notifications.
     */
    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope to get recent notifications.
     */
    public function scopeRecent(Builder $query, int $limit = 10): Builder
    {
        return $query->latest()->take($limit);
    }

    /**
     * Mark this notification as read.
     */
    public function markAsRead(): bool
    {
        return $this->update(['is_read' => true]);
    }

    /**
     * Record a new lead notification.
     */
    public static function recordLead(Lead $lead): self
    {
        $product = $lead->product_interest ?: 'General Inquiry';
        $title   = 'New Lead: ' . $product;
        $details = $lead->name . ($lead->phone ? ' • ' . $lead->phone : '');

        return static::create([
            'type'        => 'lead',
            'title'       => $title,
            'message'     => $details,
            'url'         => route('admin.leads.index', ['search' => $lead->phone ?: ($lead->email ?: $lead->name)]),
            'icon'        => 'fa-solid fa-wheat-awn',
            'icon_color'  => 'orange',
            'is_read'     => false,
            'related_id'  => $lead->id,
        ]);
    }

    /**
     * Record a system notification.
     */
    public static function recordSystem(
        string $title,
        ?string $message = null,
        ?string $url = null,
        string $icon = 'fa-solid fa-gear',
        string $iconColor = 'green'
    ): self {
        return static::create([
            'type'        => 'system',
            'title'       => $title,
            'message'     => $message,
            'url'         => $url ?: route('admin.dashboard'),
            'icon'        => $icon,
            'icon_color'  => $iconColor,
            'is_read'     => false,
        ]);
    }
}
