<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    protected $fillable = [
        'logged_at',
        'site_id',
        'level',
        'message',
        'context',
        'remote_ip',
        'user_agent',
        'request_id',
        'user_id',
        'environment',
        'http_method',
        'http_path',
        'response_code'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
