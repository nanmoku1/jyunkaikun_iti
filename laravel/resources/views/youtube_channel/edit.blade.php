@extends('layouts.app')

@section('content_title', '巡回YCリスト')

@section('content')
<div class="row pt-3">
    <div class="col-sm">
        <form action="{{ route("youtube_channel.update", $youtube_channel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="yc_name">Youtubeチャンネル名</label>
                <input type="text" class="form-control @error("yc_name") is-invalid @enderror" id="yc_name" name="yc_name" value="{{ old("yc_name", $youtube_channel->yc_name) }}" placeholder="Youtubeチャンネル名" autocomplete="yc_name" autofocus="">
                @include('components.form_error_message', ['input_name' => 'yc_name'])
            </div>
            <div class="form-group">
                <label for="yc_id">YoutubeチャンネルID</label>
                <input type="text" class="form-control @error("yc_id") is-invalid @enderror" id="yc_id" name="yc_id" value="{{ old("yc_id", $youtube_channel->yc_id) }}" placeholder="YoutubeチャンネルID" autocomplete="yc_id" autofocus="">
                @include('components.form_error_message', ['input_name' => 'yc_id'])
            </div>
            <div class="form-group">
                <label for="yc_list_id">YoutubeチャンネルリストID</label>
                <input type="text" class="form-control @error("yc_list_id") is-invalid @enderror" id="yc_list_id" name="yc_list_id" value="{{ old("yc_list_id", $youtube_channel->yc_list_id) }}" placeholder="YoutubeチャンネルリストID" autocomplete="yc_list_id" autofocus="">
                @include('components.form_error_message', ['input_name' => 'yc_list_id'])
            </div>

            <hr class="mb-3">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route("youtube_channel.show", $youtube_channel->id) }}" class="btn btn-secondary">キャンセル</a>
                </li>
                <li class="list-inline-item">
                    <button type="submit" class="btn btn-primary">更新</button>
                </li>
            </ul>
        </form>
    </div>
</div>

@endsection
