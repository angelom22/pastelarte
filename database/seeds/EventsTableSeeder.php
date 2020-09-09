<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Event::class, 100)->create()->each(function (App\Models\Event $event)
        {
              $event->tags()->attach([
                rand(1,3),
                rand(4,6),
                rand(7,10),
              ]);  
        });
    }
}
