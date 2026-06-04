<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public const STATUSES = [
        'upcoming' => 'Akan Datang',
        'open' => 'Dibuka',
        'closed' => 'Ditutup',
    ];

    // Relationships
    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['upcoming', 'open']);
    }

    // Accessors
    public function getStatusDisplayAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'Akan Datang';
    }
}
