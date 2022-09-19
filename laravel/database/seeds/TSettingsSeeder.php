<?php

use Illuminate\Database\Seeder;

class TSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_settings')->insert([
            'id' => 1,
            'twitter_api_key' => '',
            'youtube_api_key' => '',
            'created_at' => new Datetime(),
        ]);
    }
}
