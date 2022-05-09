<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories  = Category::all();
        $tags = Tag::all();

        // COME RICEVERE I DATI DA UNA COLLECTION METODO pluck()
       $categoriesId = $categories->pluck('id')->all();
       $tagsId = $tags->pluck('id')->all();

        for ($i=0; $i < 100; $i++) { 
            $post = new Post();

            $post->title = $faker->words(7,true);
            $post->slug = Str::slug($post->title,'-');
            $post->content = $faker->randomElement([$faker->text(),$faker->paragraph(1),$faker->paragraph(2),$faker->paragraph(3)]);
            $post->cover = $faker->imageUrl(640, 480);
            $post->published_at = $faker->randomElement([null,$faker->dateTime()]);
            $post->category_id = $faker->optional()->randomElement( $categoriesId );
            $rnamdomInt = $faker->numberBetween(1,3);
            $randomTags = $faker->randomElements( $tagsId,$rnamdomInt);
            




              

            $post->save();

            // ATTACH SEMPRE DOPO IL SAVE ALTRIMENTI IL POST NON HA L'ID

            $post->tags()->attach($randomTags);
        }
        
    }
}
