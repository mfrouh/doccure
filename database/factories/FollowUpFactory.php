<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\FollowUp;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowUpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FollowUp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'appointment_id'=>Appointment::all()->random()->id,
            'price'=>rand(100,1000),
            'day'=>$this->faker->date,
            'time'=>$this->faker->time,
        ];
    }
}
