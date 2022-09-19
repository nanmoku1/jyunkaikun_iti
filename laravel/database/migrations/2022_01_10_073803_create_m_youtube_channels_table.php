<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMYoutubeChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_youtube_channels', function (Blueprint $table) {
            $table->id();
            $table->string('yc_name');
            $table->string('yc_id')->default('');
            $table->string('yc_list_id')->default('');
            $table->timestamp('yc_check_time');
            $table->timestamps();

            $table->index('yc_name');
            $table->index('yc_id');
            $table->index('yc_list_id');
            $table->index('yc_check_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_youtube_channels');
    }
}
