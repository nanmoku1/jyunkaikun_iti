<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTYoutubeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_youtube_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_name')->default('');
            $table->text('explanation');
            $table->string('youtube_video_id')->default('');
            $table->string('yc_id')->default('');
            $table->timestamps();
            $table->softDeletes();

            $table->index('video_name');
            $table->index('youtube_video_id');
            $table->index('yc_id');
            $table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_youtube_videos');
    }
}
