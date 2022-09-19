<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MYoutubeChannels;
use App\Http\Requests\YoutubeChannel\YoutubeChannelIndexRequest;
use App\Http\Requests\YoutubeChannel\YoutubeChannelStoreRequest;
use App\Http\Requests\YoutubeChannel\YoutubeChannelUpdateRequest;

class YoutubeChannelController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth');
        //\App\DebugClass::laravel_exe_sql_log_on();
    }

    /**
     * Undocumented function
     *
     * @param YoutubeChannelIndexRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(YoutubeChannelIndexRequest $request)
    {
        $m_youtube_channels = MYoutubeChannels::select(['m_youtube_channels.*']);
        if (filled($request->ycName())) {
            $m_youtube_channels->fuzzy("yc_name", $request->ycName());
        }
        $m_youtube_channels->sort($request->sortColumn(), $request->sortDirection());
        $youtube_channels = $m_youtube_channels->paginate($request->pageUnit());
        \App\DebugClass::clog($youtube_channels->toArray());
        return view('youtube_channel.index', compact("youtube_channels"));
    }

    /**
     * Undocumented function
     *
     * @param MYoutubeChannels $youtube_channel
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(MYoutubeChannels $youtube_channel)
    {
        return view('youtube_channel.show', compact("youtube_channel"));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('youtube_channel.create');
    }

    /**
     * Undocumented function
     *
     * @param YoutubeChannelStoreRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(YoutubeChannelStoreRequest $request)
    {
        $youtube_channel = MYoutubeChannels::create($request->validated());
        return redirect()->route("youtube_channel.show", $youtube_channel->id);
    }

    /**
     * Undocumented function
     *
     * @param MYoutubeChannels $youtube_channel
     * @return void
     */
    public function edit(MYoutubeChannels $youtube_channel)
    {
        return view('youtube_channel.edit', compact("youtube_channel"));
    }

    /**
     * Undocumented function
     *
     * @param YoutubeChannelUpdateRequest $request
     * @param MYoutubeChannels $youtube_channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(YoutubeChannelUpdateRequest $request, MYoutubeChannels $youtube_channel)
    {
        $youtube_channel->update($request->validated());
        return redirect()->route("youtube_channel.show", $youtube_channel->id);
    }

    /**
     * @param MYoutubeChannels $youtube_channel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(MYoutubeChannels $youtube_channel)
    {
        $youtube_channel->delete();
        return redirect()->route("youtube_channel.index");
    }
}
