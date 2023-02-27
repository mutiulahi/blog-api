<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\{Article,Comment,Tag};

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $articles = [];
        $comments = [];
        $tags = [];

        for ($i = 0; $i < 20; $i++) {
            $articles[] = [
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'body' => $faker->paragraph,
                'likes' => $faker->numberBetween(0, 100),
                'views' => $faker->numberBetween(0, 100),
                'dislikes' => $faker->numberBetween(0, 100),
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        for ($i = 0; $i < 20; $i++) {
            $comments[] = [
                'subject' => $faker->sentence,
                'body' => $faker->paragraph,
                'article_id' => $faker->numberBetween(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        for ($i = 0; $i < 20; $i++) {
            $tags[] = [
                'name' => $faker->word,
                'slug' => $faker->slug,
                'article_id' => $faker->numberBetween(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        Article::insert($articles);
        Comment::insert($comments);
        Tag::insert($tags);
    }
}
