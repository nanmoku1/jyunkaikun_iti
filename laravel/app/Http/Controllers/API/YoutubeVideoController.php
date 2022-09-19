<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TYoutubeVideos;
use App\Http\Requests\API\YoutubeVideo\YoutubeVideoIndexRequest;
use App\Http\Requests\API\YoutubeVideo\YoutubeVideoStoreRequest;
use App\Http\Requests\API\YoutubeVideo\YoutubeVideoUpdateRequest;

class YoutubeVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param YoutubeVideoIndexRequest $request
     * @return array
     */
    public function index(YoutubeVideoIndexRequest $request)
    {
        $t_youtube_videos = TYoutubeVideos::select(['t_youtube_videos.*']);
        if (filled($request->videoName())) {
            $t_youtube_videos->fuzzy("video_name", $request->videoName());
        }
        $t_youtube_videos->sort($request->sortColumn(), $request->sortDirection());
        $youtube_videos = $t_youtube_videos->paginate($request->pageUnit());

        return $youtube_videos->all();
    }

    /**
     * @param TYoutubeVideos $youtube_video
     * @return array
     */
    public function show(TYoutubeVideos $youtube_video)
    {
        return $youtube_video->toArray();
    }

    /**
     * @param YoutubeVideoStoreRequest $request
     * @return array
     */
    public function create(YoutubeVideoStoreRequest $request)
    {
        $youtube_video = TYoutubeVideos::create($request->validated());
        return ['result' => TRUE];
    }

    /**
     * Undocumented function
     *
     * @param YoutubeVideoUpdateRequest $request
     * @return array
     */
    public function update(YoutubeVideoUpdateRequest $request)
    {
        $youtube_video = TYoutubeVideos::find($request->id());
        if ($youtube_video) {
            $youtube_video->update($request->validated());
        }
        return ['result' => TRUE];
    }

    /**
     * @param TYoutubeVideos $youtube_video
     * @return array
     */
    public function destroy(TYoutubeVideos $youtube_video)
    {
        $youtube_video->delete();
        return ['result' => TRUE];
    }
}
