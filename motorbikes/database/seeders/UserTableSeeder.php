<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=[
            [
                'name' => 'Mohammad shiasy',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
