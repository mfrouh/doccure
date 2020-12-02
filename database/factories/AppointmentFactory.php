<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'=>Patient::all()->random()->id,
            'clinic_id'=>Clinic::all()->random()->id,
            'price'=>rand(100,1000),
            'state'=>'pending',
            'day'=>$this->faker->date,
            'time'=>$this->faker->time,
            'booking_day'=>$this->faker->date,
            'booking_time'=>$this->faker->time,
        ];
    }
}
