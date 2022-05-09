<?php

use App\Category;
use App\Post;
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
        
        // COME RICEVERE I DATI DA UNA COLLECTION METODO pluck()
       $categoriesId = $categories->pluck('id')->all();

        for ($i=0; $i < 100; $i++) { 
            $post = new Post();

            $post->title = $faker->words(7,true);
            $post->slug = Str::slug($post->title,'-');
            $post->content = $faker->randomElement([$faker->text(),$faker->paragraph(1),$faker->paragraph(2),$faker->paragraph(3)]);
            $post->cover = $faker->imageUrl(640, 480);
            $post->published_at = $faker->randomElement([null,$faker->dateTime()]);
            $post->category_id = $faker->optional()->randomElement( $categoriesId );


              

            $post->save();
        }
        
    }
}
