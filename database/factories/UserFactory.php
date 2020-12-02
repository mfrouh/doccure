<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PharIo\Manifest\ElementCollection;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
            'phone_number'=>'0'.rand(1000000000,1299999999),
            'gender'=>$this->faker->randomElement(['male','female']),
            'date_of_birth'=>$this->faker->date,
            'image'=>'storage/patient/1.png',
        ];
    }
}
