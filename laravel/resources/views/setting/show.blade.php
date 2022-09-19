@extends('layouts.app')

@section('content_title', '設定')

@section('content')
<ul class="list-inline pt-3">
    <li class="list-inline-item">
        <a href="{{ route("setting.edit", $setting->id) }}" class="btn btn-success">編集</a>
    </li>
</ul>


<table class="table">
    <tbody>
        <tr>
            <th>Twitter API KEY</th>
            <td>{{ $setting->twitter_api_key }}</td>
        </tr>
        <tr>
            <th>Youtube API KEY</th>
            <td>{{ $setting->youtube_api_key }}</td>
        </tr>
        <tr>
            <th>API TOKEN</th>
            <td>{{ auth()->user()->api_token }}</td>
        </tr>
    </tbody>
</table>
@endsection
