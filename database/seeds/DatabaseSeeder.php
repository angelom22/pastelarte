<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AngelPermissionInfoSeeder::class);
        $this->call(CarretasTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
        // $this->call(BlogsTableSeeder::class);
    }
}
