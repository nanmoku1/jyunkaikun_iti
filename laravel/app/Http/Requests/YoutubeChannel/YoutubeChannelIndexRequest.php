<?php

namespace App\Http\Requests\YoutubeChannel;

use Illuminate\Foundation\Http\FormRequest;

class YoutubeChannelIndexRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "sort_column" => "in:id",
            "sort_direction" => "in:asc,desc",
            "page_unit" => "integer",
        ];
    }

    /**
     * @return mixed
     */
    public function ycName()
    {
        return $this->input('yc_name');
    }

    /**
     * @return mixed
     */
    public function sortColumn()
    {
        return $this->input('sort_column', 'id');
    }

    /**
     * @return mixed
     */
    public function sortDirection()
    {
        return $this->input('sort_direction', 'asc');
    }

    /**
     * @return mixed
     */
    public function pageUnit()
    {
        return $this->input('page_unit', 10);
    }
}
