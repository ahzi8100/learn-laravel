<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_min = User::pluck('id')->min();
        $id_max = User::pluck('id')->max();
        return [
            'phone_number' => fake('id_ID')->phoneNumber(),
            'provider_name' => fake('id_ID')->company(),
            'user_id' => fake()->numberBetween($id_min, $id_max),
        ];
    }
}
