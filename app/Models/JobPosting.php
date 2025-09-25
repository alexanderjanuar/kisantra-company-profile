<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'employment_type',
        'salary_min',
        'salary_max',
        'requirements',
        'application_deadline',
        'status',
        'work_type',
    ];

    protected $casts = [
        'application_deadline' => 'datetime',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeRemote($query)
    {
        return $query->where('work_type', 'remote');
    }

    public function scopeHybrid($query)
    {
        return $query->where('work_type', 'hybrid');
    }

    public function scopeOnsite($query)
    {
        return $query->where('work_type', 'onsite');
    }

    public function getWorkTypeDisplayAttribute()
    {
        return match($this->work_type) {
            'remote' => 'Remote',
            'hybrid' => 'Hybrid',
            'onsite' => 'Di Kantor',
            default => 'Di Kantor'
        };
    }

    public function getEmploymentTypeDisplayAttribute()
    {
        return match($this->employment_type) {
            'full_time' => 'Waktu Penuh',
            'part_time' => 'Paruh Waktu',
            'contract' => 'Kontrak',
            'internship' => 'Magang',
            default => 'Waktu Penuh'
        };
    }

    public function getStatusDisplayAttribute()
    {
        return match($this->status) {
            'draft' => 'Draft',
            'active' => 'Aktif',
            'closed' => 'Ditutup',
            default => 'Draft'
        };
    }
}