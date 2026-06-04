<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'featured_image',
        'content',
        'is_pinned',
        'status',
        'published_at',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Relationships
    public function attachments()
    {
        return $this->hasMany(AnnouncementAttachment::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }

    // Accessors
    public function getFeaturedImageAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        return '/storage/' . ltrim($value, '/');
    }

    public function getStatusDisplayAttribute(): string
    {
        return match ($this->status) {
            'published' => 'Dipublikasikan',
            'draft' => 'Draft',
            default => 'Draft',
        };
    }
}
