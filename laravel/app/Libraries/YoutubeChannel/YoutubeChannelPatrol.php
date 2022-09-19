<?php

namespace App\Libraries\YoutubeChannel;

use App\Models\TSetting;
use App\Models\TYoutubeVideos;
use App\Models\MYoutubeChannels;
use CurlExe;
use YoutubeChannelPatrolConst;

class YoutubeChannelPatrol
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \App\DebugClass::clog('YoutubeChannelPatrol construct');
    }

    /**
     *
     * @return void
     */
    public function patrol()
    {
        $setting = TSetting::first();
        $youtube_channel = MYoutubeChannels::patrolTargetDate()->sort('yc_check_time', 'asc')->first();

        if (is_null($youtube_channel)) {
            return;
        }

        if (blank($youtube_channel->yc_list_id)) {
            $response = CurlExe::exe(['url' => YoutubeChannelPatrolConst::API_URL_CHANNELS . '?part=contentDetails&key=' . $setting->youtube_api_key . '&id=' . $youtube_channel->yc_id]);
            if (blank($response)) {
                $youtube_channel->yc_check_time = date('Y-m-d H:i:s');
                $youtube_channel->update();
                return;
            }
            $response_json = json_decode($response, true);
            // \App\DebugClass::clog($response_json);
            if (!isset($response_json["items"][0]["contentDetails"]["relatedPlaylists"]["uploads"])) {
                // YCチェック時間更新
                $youtube_channel->yc_check_time = date('Y-m-d H:i:s');
                $youtube_channel->update();
                return;
            }
            $youtube_channel->yc_list_id = $response_json["items"][0]["contentDetails"]["relatedPlaylists"]["uploads"];
        }

        $response = CurlExe::exe(['url' => YoutubeChannelPatrolConst::API_URL_PLAYLIST_ITEMS . '?part=snippet&key=' . $setting->youtube_api_key . '&maxResults=10&playlistId=' . $youtube_channel->yc_list_id]);
        if (blank($response)) {
            return;
        }

        // YCチェック時間更新
        $youtube_channel->yc_check_time = date('Y-m-d H:i:s');
        $youtube_channel->update();

        $response_json = json_decode($response, true);
        \App\DebugClass::clog($response);
        for ($i = 0; $i < count($response_json["items"]); $i++) {
            $existence_t_youtube_video = TYoutubeVideos::select(["id"])->where('youtube_video_id', $response_json["items"][$i]["snippet"]["resourceId"]["videoId"])->first();
            if (!is_null($existence_t_youtube_video)) {
                continue;
            }
            TYoutubeVideos::create([
                'video_name'          => $response_json["items"][$i]["snippet"]["title"],
                'explanation'         => $response_json["items"][$i]["snippet"]["description"],
                'youtube_video_id'    => $response_json["items"][$i]["snippet"]["resourceId"]["videoId"],
                'yc_id'               => $response_json["items"][$i]["snippet"]["channelId"],
            ]);
        }
    }
}
