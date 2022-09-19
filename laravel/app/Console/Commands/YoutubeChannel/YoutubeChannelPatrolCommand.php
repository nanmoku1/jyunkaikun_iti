<?php

namespace App\Console\Commands\YoutubeChannel;

use Illuminate\Console\Command;
use YoutubeChannel\YoutubeChannelPatrol;

class YoutubeChannelPatrolCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube_channel:patrol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'm_youtube_channels Tables Patrol';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        YoutubeChannelPatrol::patrol();
    }
}
