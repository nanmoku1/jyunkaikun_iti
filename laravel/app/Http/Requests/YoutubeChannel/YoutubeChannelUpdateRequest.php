<?php

namespace App\Http\Requests\YoutubeChannel;

use Illuminate\Foundation\Http\FormRequest;

class YoutubeChannelUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "yc_name"      => "required|string|max:255",
            "yc_id"        => "required|string|max:255",
            "yc_list_id"   => "max:255",
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            "yc_name.max"      => "Youtubeチャンネル名は255文字以内です。",
            "yc_id.max"        => "YoutubeチャンネルIDは255文字以内です。",
            "yc_list_id.max"   => "YoutubeチャンネルリストIDは255文字以内です。",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'yc_id'         => filled($this->yc_id) ? $this->yc_id : '',
            'yc_list_id'    => filled($this->yc_list_id) ? $this->yc_list_id : '',
        ]);
    }
}
