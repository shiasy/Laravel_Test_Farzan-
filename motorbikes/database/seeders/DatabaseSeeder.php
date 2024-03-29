<?php

namespace Database\Seeders;


use App\Models\Motors;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);

        Motors::factory(100)->create([
            'user_id' => User::get()->first()->id
        ]);
    }
}
