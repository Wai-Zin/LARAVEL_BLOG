<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
             User::create([
            'name' => 'Wai Zin ',
            'email' => 'wzpa43@gmail.com ',
           'password' => bcrypt('444555')
          ]);

        // $this->call(\Database\Seeders\UserSeeder::class);
        // $this->call(\Datbase\Seeders\PostSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);

        //Category::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
