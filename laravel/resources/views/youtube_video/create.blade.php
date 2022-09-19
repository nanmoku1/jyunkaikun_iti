@extends('layouts.app')

@section('content_title', '登録動画リスト')

@section('content')
<div class="row pt-3">
    <div class="col-sm">
        <form action="{{ route("youtube_video.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="video_name">タイトル</label>
                <input type="text" class="form-control @error("video_name") is-invalid @enderror" id="video_name" name="video_name" value="{{ old("video_name") }}" placeholder="タイトル" autocomplete="video_name" autofocus="">
                @include('components.form_error_message', ['input_name' => 'video_name'])
            </div>
            <div class="form-group">
                <label for="explanation">説明</label>
                <textarea class="form-control @error("explanation") is-invalid @enderror" id="explanation" name="explanation" placeholder="説明">{{ old("explanation") }}</textarea>
                @include('components.form_error_message', ['input_name' => 'explanation'])
            </div>
            <div class="form-group">
                <label for="youtube_video_id">Youtube動画ID</label>
                <input type="text" class="form-control @error("youtube_video_id") is-invalid @enderror" id="youtube_video_id" name="youtube_video_id" value="{{ old("youtube_video_id") }}" placeholder="Youtube動画ID" autocomplete="youtube_video_id" autofocus="">
                @include('components.form_error_message', ['input_name' => 'youtube_video_id'])
            </div>
            <div class="form-group">
                <label for="yc_id">YoutubeチャンネルID</label>
                <input type="text" class="form-control @error("yc_id") is-invalid @enderror" id="yc_id" name="yc_id" value="{{ old("yc_id") }}" placeholder="YoutubeチャンネルID" autocomplete="yc_id" autofocus="">
                @include('components.form_error_message', ['input_name' => 'yc_id'])
            </div>

            <hr class="mb-3">

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route("youtube_video.index") }}" class="btn btn-secondary">キャンセル</a>
                </li>
                <li class="list-inline-item">
                    <button type="submit" class="btn btn-primary">作成</button>
                </li>
            </ul>
        </form>
    </div>
</div>

@endsection
