<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "twitter_api_key" => "required|string|max:255",
            "youtube_api_key" => "required|string|max:255",
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            "twitter_api_key.max" => "Twitter API KYEは255文字以内です。",
            "youtube_api_key.max" => "Youtbe API KYEは255文字以内です。",
        ];
    }

    /**
     * @return mixed
     */
    public function isMakeToken()
    {
        return $this->input('is_make_token');
    }
}
