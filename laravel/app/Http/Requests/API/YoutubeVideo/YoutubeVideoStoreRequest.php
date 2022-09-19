<?php

namespace App\Http\Requests\API\YoutubeVideo;

use Illuminate\Foundation\Http\FormRequest;

class YoutubeVideoStoreRequest extends FormRequest
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
            "youtube_video_id" => "required|string|max:255",
            "yc_id"            => "required|string|max:255",
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
