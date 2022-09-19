<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MYoutubeChannels extends Model
{
    protected $fillable = [
        'yc_name',
        'yc_id',
        'yc_list_id',
    ];

    /**
     * Undocumented function
     *
     * @param Builder $query
     * @param string $column
     * @param string $keyword
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeFuzzy(Builder $query, string $column, string $keyword)
    {
        return $query->where($column, "like", "%{$keyword}%");
    }

    /**
     * Undocumented function
     *
     * @param Builder $query
     * @param string $column
     * @param string $keyword
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopePatrolTargetDate(Builder $query)
    {
        $target_stringj_date = date('Y-m-d H:i:s', strtotime('- 2 hour'));
        \App\DebugClass::clog($target_stringj_date);
        return $query->where('yc_check_time', '<=', $target_stringj_date);
    }

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

        $order_by_direction = "m_youtube_channels.id";
        switch ($column) {
            case "yc_check_time":
                $order_by_direction = "m_youtube_channels.yc_check_time";
                break;
            default:
        }
        return $query->orderBy($order_by_direction, $order_by_column);
    }

    //  /**
    //  * @param UploadedFile|null $value
    //  */
    // public function setImagePathAttribute(?UploadedFile $value)
    // {
    //     \App\DebugClass::clog($value);
    //     if (is_null($value)) {
    //         // $this->attributes['image_path'] = null;
    //     } else {
    //         // $this->attributes['image_path'] = $value->store("product_images");
    //         $value->store("product_images");
    //     }
    //     // \Storage::delete($this->getOriginal("image_path"));
    // }
}
