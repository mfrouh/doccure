<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'country'=>$this->faker->country,
            'city'=>$this->faker->city,
            'address'=>$this->faker->address,
            'state'=>$this->faker->state,
            'blood_group'=>$this->faker->randomElement(['A','AB','A+','O']),
        ];
    }
}
