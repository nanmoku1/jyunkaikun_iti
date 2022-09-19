@extends('layouts.app')

@section('content_title', '巡回YCリスト')

@section('content')
<form class="shadow p-3 mt-3" action={{ route("youtube_channel.index") }}>
    <div class="row">
        <div class="col-md-8 mb-3">
            <input type="text" class="form-control" id="yc_name" name="yc_name" value="" placeholder="チャンネル名">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <select class="custom-select" name="sort_direction">
                <option value="asc" {{ request("sort_direction") === "asc" ? "selected" : "" }}>並び替え方向: 昇順</option>
                <option value="desc" {{ request("sort_direction") === "desc" ? "selected" : "" }}>並び替え方向: 降順</option>
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
        <a href="{{ route("youtube_channel.create") }}" class="btn btn-success">新規</a>
    </li>
    <li class="list-inline-item">
        <button type="button" class="btn btn-success" id="btn_kick_bat">巡回バッチ起動</button>
    </li>
</ul>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>最終巡回時間</th>
        </tr>
        </thead>
        <tbody>
        @foreach($youtube_channels as $youtube_channel)
            <tr>
                <td>{{ $youtube_channel->id }}</td>
                <td><a href="{{ route("youtube_channel.show", $youtube_channel->id) }}">{{ $youtube_channel->yc_name }}</a></td>
                <td>{{ date('Y年m月d日 H時i分', strtotime($youtube_channel->yc_check_time)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



<div class="modal fade" id="bat-confirm-modal" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">巡回バッチ起動確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            巡回バッチを起動しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-bat-confirm-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-bat-confirm-modal-ok" data-url="{{ action('API\YoutubeChannelController@kickBat') }}">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
<script src="{{ asset('js/youtube_channel.js') }}"></script>
@endsection
