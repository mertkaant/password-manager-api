<?php

namespace Database\Factories;

use App\Models\Password;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasswordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Password::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'platform'          => $this->faker->firstName,
            'email'             => $this->faker->unique()->safeEmail,
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'description'       => $this->faker->sentence
        ];
    }
}
