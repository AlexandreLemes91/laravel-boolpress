<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voi
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_post = new Post();

            $new_post->title = $faker->words( rand(1,4), true );
            $new_post->slug = Str::slug( $new_post->title, '-' );
            $new_post->content = $faker->text(rand(100,200));

            $new_post->save();
        }
    }
}
