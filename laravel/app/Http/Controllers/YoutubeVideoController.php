<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TYoutubeVideos;
use App\Http\Requests\YoutubeVideo\YoutubeVideoIndexRequest;
use App\Http\Requests\YoutubeVideo\YoutubeVideoStoreRequest;
use App\Http\Requests\YoutubeVideo\YoutubeVideoUpdateRequest;

class YoutubeVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param YoutubeVideoIndexRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(YoutubeVideoIndexRequest $request)
    {
        $t_youtube_videos = TYoutubeVideos::select(['t_youtube_videos.*']);
        if (filled($request->videoName())) {
            $t_youtube_videos->fuzzy("video_name", $request->videoName());
        }
        $t_youtube_videos->sort($request->sortColumn(), $request->sortDirection());
        $youtube_videos = $t_youtube_videos->paginate($request->pageUnit());

        return view('youtube_video.index', compact("youtube_videos"));
    }

    /**
     * @param TYoutubeVideos $youtube_video
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(TYoutubeVideos $youtube_video)
    {
        return view('youtube_video.show', compact("youtube_video"));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('youtube_video.create');
    }

    /**
     * @param YoutubeVideoStoreRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(YoutubeVideoStoreRequest $request)
    {
        $youtube_video = TYoutubeVideos::create($request->validated());
        return redirect()->route("youtube_video.show", $youtube_video->id);
    }

    /**
     * @param TYoutubeVideos $youtube_video
     * @return void
     */
    public function edit(TYoutubeVideos $youtube_video)
    {
        return view('youtube_video.edit', compact("youtube_video"));
    }

    /**
     * Undocumented function
     *
     * @param YoutubeVideoUpdateRequest $request
     * @param TYoutubeVideos $youtube_video
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(YoutubeVideoUpdateRequest $request, TYoutubeVideos $youtube_video)
    {
        $youtube_video->update($request->validated());
        return redirect()->route("youtube_video.show", $youtube_video->id);
    }

    /**
     * @param TYoutubeVideos $youtube_video
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(TYoutubeVideos $youtube_video)
    {
        $youtube_video->delete();
        return redirect()->route("youtube_video.index");
    }
}
