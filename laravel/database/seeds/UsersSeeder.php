<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '管理者',
            'email' => 'admin@a.com',
            'password' => Hash::make('password'),
            'created_at' => new Datetime(),
        ]);
    }
}
