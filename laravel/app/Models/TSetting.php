<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TSetting
 *
 */
class TSetting extends Model
{
    protected $fillable = [
        'twitter_api_key',
        'youtube_api_key',
    ];
}
