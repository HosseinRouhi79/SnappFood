<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use App\Models\FoodType;
use App\Models\RestaurantType;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        User::factory()->create([
//           'name'=>'mr.admin',
//           'email'=> 'admin@example.com',
//           'password'=> bcrypt('12345678'),
//           'role'=> UserType::Admin
//        ]);

//        RestaurantType::factory()->create([
//            'name'=>'FastFood',
//        ]);
//        FoodType::factory()->create([
//           'name'=>'Ghormeh sabzi',
//            'restaurant_type_id'=>5
//        ]);
    }
}
