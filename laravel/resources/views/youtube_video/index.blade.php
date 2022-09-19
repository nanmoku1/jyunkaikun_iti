@extends('layouts.app')

@section('content_title', '登録動画リスト')

@section('content')
    <form class="shadow p-3 mt-3" action={{ route("youtube_video.index") }}>
        <div class="row">
            <div class="col-md-8 mb-3">
                <input type="text" class="form-control" id="video_name" name="video_name" value="" placeholder="チャンネル名">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <select class="custom-select" name="sort_direction">
                    <option value="asc" {{ request("sort_direction") === "asc" ? "selected" : "" }}>並び替え方向: 昇順</option>
                    <option value="desc" {{ request("sort_direction") === "desc" || request("sort_direction") === NULL ? "selected" : "" }}>並び替え方向: 降順</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <select class="custom-select" name="page_unit">
                    <option value="10">表示: 10件</option>
                    <option value="20" {{ request("page_unit") == 20 ? "selected" : "" }}>表示: 20件</option>
                    <option value="50" {{ request("page_unit") == 50 ? "selected" : "" }}>表示: 50件</option>
                    <option value="100" {{ request("page_unit") == 100 ? "selected" : "" }}>表示: 100件</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm mb-3">
                <button type="submit" class="btn btn-block btn-primary">検索</button>
            </div>
        </div>
    </form>
    <ul class="list-inline pt-3">
        <li class="list-inline-item">
            <a href="{{ route("youtube_video.create") }}" class="btn btn-success">新規</a>
        </li>
    </ul>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
            </tr>
            </thead>
            <tbody>
            @foreach($youtube_videos as $youtube_video)
                <tr>
                    <td>{{ $youtube_video->id }}</td>
                    <td><a href="{{ route("youtube_video.show", $youtube_video->id) }}">{{ $youtube_video->video_name }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
