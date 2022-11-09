<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::where('role',UserType::Customer)->get()->random()->id,
            'title'=>$this->faker->randomElement(['Home','Work','Company','Hospital','Hotel','Park','Gym','School']),
            'address'=>$this->faker->text,
            'latitude'=>$this->faker->randomFloat(2,1,100),
            'longitude'=>$this->faker->randomFloat(2,1,100)
        ];
    }
}
