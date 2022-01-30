<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::factory(50)->create();
        User::factory(50)->create();
        User::create([
            'name' => 'mahmoud',
            'username' => 'Mahmoud',
            'email' => 'm@g.com',
            'password' => 'mahmoud123',
        ]);
    }
}
