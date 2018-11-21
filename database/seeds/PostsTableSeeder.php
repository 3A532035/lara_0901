<?php

use App\Post;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $total = 20;
        $faker = Faker::create('zh_TW');

        foreach (range(1, $total) as $index) {
            Post::create([
                'title'   => $faker->realText(20),
                'content' => $faker->realText(200),
                'is_feature' => rand(0, 1),
                'created_at' => Carbon::now()->subDays($total - $index),
                'updated_at' => Carbon::now()->subDays($total - $index)->addHours(rand(1, 24)),
            ]);
        }
    }
}
