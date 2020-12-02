<?php

namespace Database\Factories;

use App\Models\clinic;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class clinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id'=>Doctor::all()->random()->id,
            'country'=>$this->faker->country,
            'city'=>$this->faker->city,
            'address'=>$this->faker->address,
            'state'=>$this->faker->state,
            'price'=>rand(100,1000),
            'open'=>$this->faker->time(),
            'close'=>$this->faker->time(),
            'time_appointment'=>$this->faker->randomElement(['15','30','45','60']),
            'type_booking'=>$this->faker->randomElement(['7','14','30']),
            'days_work'=>json_encode(['friday','sunday']),
        ];
    }
}
