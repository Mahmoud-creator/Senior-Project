<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Product;
use App\Models\Shop;
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
        for($i = 0;$i<4;$i++){
            $shop = Shop::factory()->create();
            Product::factory(5)->create([
                'shop_id' => $shop->id
            ]);
        }
        User::factory(20)->create();

        User::create([
            'name' => 'mahmoud',
            'username' => 'Mahmoud',
            'email' => 'm@g.com',
            'password' => 'mahmoud123',
        ]);
        User::create([
            'name' => 'maria',
            'username' => 'Maria',
            'email' => 'a@g.com',
            'password' => 'mahmoud123',
        ]);

    }
}

