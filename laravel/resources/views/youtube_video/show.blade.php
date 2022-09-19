@extends('layouts.app')

@section('content_title', '登録動画リスト')

@section('content')
<ul class="list-inline pt-3">
    <li class="list-inline-item">
        <a href="{{ route("youtube_video.index") }}" class="btn btn-light">一覧</a>
    </li>
    <li class="list-inline-item">
        <a href="{{ route("youtube_video.edit", $youtube_video->id) }}" class="btn btn-success">編集</a>
    </li>
    <li class="list-inline-item">
        <form action="{{ route("youtube_video.destroy", $youtube_video->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
    </li>
</ul>

<table class="table">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $youtube_video->id }}</td>
        </tr>
        <tr>
            <th>video_name</th>
            <td>{{ $youtube_video->video_name }}</td>
        </tr>
        <tr>
            <th>youtube_video_id</th>
            <td>{{ $youtube_video->youtube_video_id }}</td>
        </tr>
        <tr>
            <th>yc_id</th>
            <td>{{ $youtube_video->yc_id }}</td>
        </tr>
    </tbody>
</table>
@endsection
