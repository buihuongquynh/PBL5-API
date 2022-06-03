<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'name' => $this->faker->name($gender),
            'birthday' => $this->faker->date,
            'gender' => $gender,
            'phoneNumber' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->streetAddress,
            'orderHistory' => $this->faker->word,
            'cartID' => $this->faker->randomDigit,
        ];
    }
}
