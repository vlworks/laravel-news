<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ResourceSeeder::class);
        //$this->call(CategorySeeder::class);
    }
}
