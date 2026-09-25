<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'product_interest',
        'quantity',
        'message',
        'source',
        'status',
        'notes',
        'ip_address',
        'user_agent',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Lead $lead) {
            try {
                \App\Models\AdminNotification::recordLead($lead);
            } catch (\Throwable $e) {
                // Silently continue
            }
        });
    }

    /**
     * Scope a query to only include new leads.
     */
    public function scopeNew(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope a query to only include contacted leads.
     */
    public function scopeContacted(Builder $query): Builder
    {
        return $query->where('status', 'contacted');
    }

    /**
     * Scope a query to only include closed leads.
     */
    public function scopeClosed(Builder $query): Builder
    {
        return $query->where('status', 'closed');
    }

    /**
     * Get a formatted status badge HTML.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'new' => '<span class="badge" style="background: rgba(239, 128, 28, 0.12); color: #C95B00; font-weight: 700; padding: 3px 9px; border-radius: 9999px; font-size: 0.725rem;"><i class="fa-solid fa-sparkles"></i> New Lead</span>',
            'contacted' => '<span class="badge" style="background: rgba(59, 130, 246, 0.12); color: #2563eb; font-weight: 700; padding: 3px 9px; border-radius: 9999px; font-size: 0.725rem;"><i class="fa-solid fa-phone"></i> Contacted</span>',
            'closed' => '<span class="badge" style="background: rgba(16, 185, 129, 0.12); color: #059669; font-weight: 700; padding: 3px 9px; border-radius: 9999px; font-size: 0.725rem;"><i class="fa-solid fa-check"></i> Closed</span>',
            default => '<span class="badge" style="background: rgba(100, 116, 139, 0.12); color: #475569; font-weight: 700; padding: 3px 9px; border-radius: 9999px; font-size: 0.725rem;">' . ucfirst($this->status) . '</span>',
        };
    }
}
