<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Blog::class, 200)->create()->each(function (App\Models\Blog $blog)
        {
              $blog->tags()->attach([
                rand(1,3),
                rand(4,6),
                rand(7,10),
              ]);  
        });
    }
}
