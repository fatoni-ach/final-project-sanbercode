<?php

use Illuminate\Database\Seeder;

class Post_filmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Post_film', 5)->create();
    }
}
