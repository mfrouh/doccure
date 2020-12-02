<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'speciality_id'=>Speciality::all()->random()->id,
            'abouteme'=>$this->faker->sentence,
        ];
    }
}
