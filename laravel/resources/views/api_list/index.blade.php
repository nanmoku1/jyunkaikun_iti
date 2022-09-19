@extends('layouts.app')

@section('content_title', 'APIリスト')

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>名称</th>
            <th>URL</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle">登録済みYoutubeチャンネル一覧</td>
                <td class="align-middle"><button class="btn btn-link button_api_url" data-modal_key='youtube_channel_index_modal'>{{ action('API\YoutubeChannelController@index') }}</button></td>
            </tr>
            <tr>
                <td class="align-middle">登録済みYoutubeチャンネル巡回バッチ起動</td>
                <td class="align-middle"><button class="btn btn-link button_api_url" data-modal_key='youtube_channel_bat_modal'>{{ action('API\YoutubeChannelController@kickBat') }}</button></td>
            </tr>
            <tr>
                <td class="align-middle">Youtubeチャンネル登録</td>
                <td class="align-middle"><button class="btn btn-link button_api_url" data-modal_key='youtube_channel_create_modal'>{{ action('API\YoutubeChannelController@create') }}</button></td>
            </tr>
            <tr>
                <td class="align-middle">Youtubeチャンネル更新</td>
                <td class="align-middle"><button class="btn btn-link button_api_url" data-modal_key='youtube_channel_update_modal'>{{ action('API\YoutubeChannelController@update') }}</button></td>
            </tr>
            <tr>
                <td class="align-middle">Youtube動画一覧</td>
                <td class="align-middle"><button class="btn btn-link button_api_url" data-modal_key='youtube_video_index_modal'>{{ action('API\YoutubeVideoController@index') }}</button></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="youtube-channel-index-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Youtubeチャンネル一覧</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="youtube_channel_index_yc_name">検索：チャンネル名</label>
                    <input type="text" class="form-control" id="youtube_channel_index_yc_name" name="youtube_channel_index_yc_name" value="" placeholder="検索：チャンネル名">
                </div>
                <div class="form-group">
                    <label for="youtube_channel_index_sort_direction">並び替え方向</label>
                    <select class="custom-select" id="youtube_channel_index_sort_direction" name="youtube_channel_index_sort_direction">
                        <option value="asc">並び替え方向: 昇順</option>
                        <option value="desc">並び替え方向: 降順</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="youtube_channel_index_page_unit">取得件数</label>
                    <select class="custom-select" id="youtube_channel_index_page_unit" name="youtube_channel_index_page_unit">
                        <option value="10">表示: 10件</option>
                        <option value="20">表示: 20件</option>
                        <option value="50">表示: 50件</option>
                        <option value="100">表示: 100件</option>
                    </select>
                </div>
                <div class="modal_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-api-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-youtube-channel-index-modal-send">送信</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="youtube-channel-bat-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Youtubeチャンネル巡回バッチ起動</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-api-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-youtube-channel-bat-modal-send">送信</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="youtube-channel-create-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Youtubeチャンネル登録</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="youtube_channel_create_yc_name">チャンネル名</label>
                    <input type="text" class="form-control" id="youtube_channel_create_yc_name" name="youtube_channel_create_yc_name" value="" placeholder="チャンネル名">
                </div>
                <div class="form-group">
                    <label for="youtube_channel_create_yc_id">YoutubeチャンネルID</label>
                    <input type="text" class="form-control" id="youtube_channel_create_yc_id" name="youtube_channel_create_yc_id" value="" placeholder="YoutubeチャンネルID">
                </div>
                <div class="modal_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-api-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-youtube-channel-create-modal-send">送信</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="youtube-channel-update-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Youtubeチャンネル更新</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="youtube_channel_update_yc_main_id">更新対象主キーID</label>
                    <input type="text" class="form-control" id="youtube_channel_update_main_id" name="youtube_channel_update_main_id" value="" placeholder="更新対象主キーID">
                </div>
                <div class="form-group">
                    <label for="youtube_channel_update_yc_name">チャンネル名</label>
                    <input type="text" class="form-control" id="youtube_channel_update_yc_name" name="youtube_channel_update_yc_name" value="" placeholder="チャンネル名">
                </div>
                <div class="form-group">
                    <label for="youtube_channel_update_yc_id">YoutubeチャンネルID</label>
                    <input type="text" class="form-control" id="youtube_channel_update_yc_id" name="youtube_channel_update_yc_id" value="" placeholder="YoutubeチャンネルID">
                </div>
                <div class="modal_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-api-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-youtube-channel-update-modal-send">送信</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="youtube-video-index-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Youtube動画一覧</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="youtube_video_index_video_name">検索：動画名</label>
                    <input type="text" class="form-control" id="youtube_video_index_video_name" name="youtube_video_index_video_name" value="" placeholder="検索：動画名">
                </div>
                <div class="form-group">
                    <label for="youtube_video_index_sort_direction">並び替え方向</label>
                    <select class="custom-select" id="youtube_video_index_sort_direction" name="youtube_video_index_sort_direction">
                        <option value="asc">並び替え方向: 昇順</option>
                        <option value="desc">並び替え方向: 降順</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="youtube_video_index_page_unit">取得件数</label>
                    <select class="custom-select" id="youtube_video_index_page_unit" name="youtube_video_index_page_unit">
                        <option value="10">表示: 10件</option>
                        <option value="20">表示: 20件</option>
                        <option value="50">表示: 50件</option>
                        <option value="100">表示: 100件</option>
                    </select>
                </div>
                <div class="modal_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-api-modal-close">Close</button>
                <button type="button" class="btn btn-primary btn-youtube-video-index-modal-send">送信</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
<script src="{{ asset(mix('js/api_list.js')) }}"></script>
@endsection
