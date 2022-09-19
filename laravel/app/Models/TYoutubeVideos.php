<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class TYoutubeVideos extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'video_name',
        'explanation',
        'youtube_video_id',
        'yc_id',
    ];

    /**
     * Undocumented function
     *
     * @param Builder $query
     * @param string $column
     * @param string $direction
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSort(Builder $query, string $column, string $direction)
    {
        $order_by_column = null;
        switch ($direction) {
            case "desc":
                $order_by_column = "DESC";
                break;
            default:
                $order_by_column = "ASC";
        }

        $order_by_direction = "t_youtube_videos.id";
        return $query->orderBy($order_by_direction, $order_by_column);
    }
}
