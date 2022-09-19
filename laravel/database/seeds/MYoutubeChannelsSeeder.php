<?php

use Illuminate\Database\Seeder;

class MYoutubeChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_youtube_channels')->insert([
            'yc_name' => 'ANNNewsCH',
            'yc_id' => 'UCGCZAYq5Xxojl_tSXcVJhiQ',
            'created_at' => new Datetime(),
        ]);
        DB::table('m_youtube_channels')->insert([
            'yc_name' => 'FNNプライムオンライン',
            'yc_id' => 'UCoQBJMzcwmXrRSHBFAlTsIw',
            'created_at' => new Datetime(),
        ]);
        DB::table('m_youtube_channels')->insert([
            'yc_name' => 'ABCテレビニュース',
            'yc_id' => 'UCPW-5qfYGNR8XYrvESrqJKA',
            'created_at' => new Datetime(),
        ]);
    }
}
