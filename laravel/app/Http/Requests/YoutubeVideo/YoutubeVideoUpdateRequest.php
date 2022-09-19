<?php

namespace App\Http\Requests\YoutubeVideo;

use Illuminate\Foundation\Http\FormRequest;

class YoutubeVideoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "video_name"       => "required|string|max:255",
            "explanation"      => "string",
            "youtube_video_id" => "required|string",
            "yc_id"            => "required|string",
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            "yc_name.max"      => "Youtubeチャンネル名は255文字以内です。",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'youtube_video_id' => filled($this->youtube_video_id) ? $this->youtube_video_id : '',
            'yc_id'            => filled($this->yc_id) ? $this->yc_id : '',
        ]);
    }
}
