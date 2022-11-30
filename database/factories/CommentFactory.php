<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author'=>$this->faker->name,
//            'user_id'=>User::where('role',UserType::Customer)->get()->random()->id,
            'order_id'=>$this->faker->randomElement([39,40,44,46]),
            'content'=>$this->faker->text,
        ];
    }
}
