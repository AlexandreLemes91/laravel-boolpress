<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 6; $i++){
            $new_tag = new Tag();

            $new_tag->name = $faker->word();
            $new_tag->slug = Str::slug( $new_tag->name, '-' );

            $new_tag->save();
        }
    }
}
