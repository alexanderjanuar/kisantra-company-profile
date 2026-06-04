<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementAttachment extends Model
{
    protected $fillable = [
        'announcement_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'mime_type',
        'description',
        'download_count',
    ];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    /**
     * Public URL for the stored file (served from the public disk).
     */
    public function getUrlAttribute(): ?string
    {
        if (empty($this->file_path)) {
            return null;
        }

        if (str_starts_with($this->file_path, 'http://') || str_starts_with($this->file_path, 'https://')) {
            return $this->file_path;
        }

        return '/storage/' . ltrim($this->file_path, '/');
    }
}
