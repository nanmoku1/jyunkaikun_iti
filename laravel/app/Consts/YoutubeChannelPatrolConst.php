<?php

namespace App\Consts;

class YoutubeChannelPatrolConst
{
    public const API_URL_CHANNELS = 'https://www.googleapis.com/youtube/v3/channels/';
    public const API_URL_PLAYLIST_ITEMS = 'https://www.googleapis.com/youtube/v3/playlistItems/';

    public const MEMBER_LIST = [
        'Youtube Data v3 API チャンネル情報取得' => self::API_URL_CHANNELS,
        'Youtube Data v3 API プレイリスト動画一覧取得' => self::API_URL_PLAYLIST_ITEMS,
    ];
}
