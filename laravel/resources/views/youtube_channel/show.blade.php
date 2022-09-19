@extends('layouts.app')

@section('content_title', '巡回YCリスト')

@section('content')
<ul class="list-inline pt-3">
    <li class="list-inline-item">
        <a href="{{ route("youtube_channel.index") }}" class="btn btn-light">一覧</a>
    </li>
    <li class="list-inline-item">
        <a href="{{ route("youtube_channel.edit", $youtube_channel->id) }}" class="btn btn-success">編集</a>
    </li>
    <li class="list-inline-item">
        <form action="{{ route("youtube_channel.destroy", $youtube_channel->id) }}" method="POST">
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
            <td>{{ $youtube_channel->id }}</td>
        </tr>
        <tr>
            <th>yc_name</th>
            <td>{{ $youtube_channel->yc_name }}</td>
        </tr>
        <tr>
            <th>yc_id</th>
            <td>{{ $youtube_channel->yc_id }}</td>
        </tr>
        <tr>
            <th>yc_list_id</th>
            <td>{{ $youtube_channel->yc_list_id }}</td>
        </tr>
        <tr>
            <th>最終巡回時間</th>
            <td>{{ date('Y年m月d日 H時i分', strtotime($youtube_channel->yc_check_time)) }}</td>
        </tr>
    </tbody>
</table>
@endsection
