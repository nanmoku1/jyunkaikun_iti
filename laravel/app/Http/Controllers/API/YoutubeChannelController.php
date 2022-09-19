<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MYoutubeChannels;
use App\Http\Requests\API\YoutubeChannel\YoutubeChannelIndexRequest;
use App\Http\Requests\API\YoutubeChannel\YoutubeChannelStoreRequest;
use App\Http\Requests\API\YoutubeChannel\YoutubeChannelUpdateRequest;

class YoutubeChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        // $this->middleware('jwt.auth'); //jwt.auth
    }

    /**
     * @param YoutubeChannelIndexRequest $request
     * @return array  m_youtube_channelsテーブルからの抽出結果
     */
    public function index(YoutubeChannelIndexRequest $request)
    {
        $m_youtube_channels = MYoutubeChannels::select(['m_youtube_channels.*']);
        if (filled($request->ycName())) {
            $m_youtube_channels->fuzzy("yc_name", $request->ycName());
        }
        $m_youtube_channels->sort($request->sortColumn(), $request->sortDirection());
        $youtube_channels = $m_youtube_channels->paginate($request->pageUnit());
        return $youtube_channels->all();
    }

    /**
     * @param YoutubeChannelStoreRequest $request
     * @return array ['result' => TRUE]
     */
    public function create(YoutubeChannelStoreRequest $request)
    {
        $youtube_channel = MYoutubeChannels::create($request->validated());
        return ['result' => TRUE];
    }

    /**
     * @param YoutubeChannelUpdateRequest $request
     * @return array ['result' => TRUE]
     */
    public function update(YoutubeChannelUpdateRequest $request)
    {
        $youtube_channel = MYoutubeChannels::find($request->id());
        if ($youtube_channel) {
            $youtube_channel->update($request->validated());
        }
        return ['result' => TRUE];
    }

    /**
     * @return array ['result' => TRUE]
     */
    public function kickBat(Request $request)
    {
        chdir(base_path());
        exec('php artisan youtube_channel:patrol > /dev/null &'); // 非同期実行する為「 > /dev/null &」を付与
        return ['result' => TRUE];
    }
}
