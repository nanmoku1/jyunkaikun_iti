@extends('layouts.app')

@section('content_title', '設定')

@section('content')
<div class="row pt-3">
    <div class="col-sm">
        <form action="{{ route("setting.update", $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="twitter_api_key">Twitter API KEY</label>
                <input type="text" class="form-control @error("twitter_api_key") is-invalid @enderror" id="twitter_api_key" name="twitter_api_key" value="{{ old("twitter_api_key", $setting->twitter_api_key) }}" placeholder="Twiter API KEY" autocomplete="twitter_api_key" autofocus="">
                @include('components.form_error_message', ['input_name' => 'twitter_api_key'])
            </div>
            <div class="form-group">
                <label for="youtube_api_key">Youtube API KEY</label>
                <input type="text" class="form-control @error("youtube_api_key") is-invalid @enderror" id="youtube_api_key" name="youtube_api_key" value="{{ old("youtube_api_key", $setting->youtube_api_key) }}" placeholder="Youtube API KEY" autocomplete="youtube_api_key" autofocus="">
                @include('components.form_error_message', ['input_name' => 'youtube_api_key'])
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="is_make_token" id="is_make_token" value="1" {{ old('is_make_token') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_make_token">トークン作成・再作成</label>
                </div>
            </div>

            <hr class="mb-3">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route("setting.show", $setting->id) }}" class="btn btn-secondary">キャンセル</a>
                </li>
                <li class="list-inline-item">
                    <button type="submit" class="btn btn-primary">更新</button>
                </li>
            </ul>
        </form>
    </div>
</div>

@endsection
