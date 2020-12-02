<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\FollowUp;
use App\Models\Patient;
use App\Models\Social;
use App\Models\Speciality;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['role'=>'admin']);
        Speciality::factory()->count(10)->create();
        User::factory()->count(10)->create(['role'=>'doctor'])
        ->each(function ($u) {
              $u->doctor()->save(Doctor::factory()->create())
                ->clinic()->save(Clinic::factory()->create());
                // ->social()->save(Social::factory()->create());
        });
        User::factory()->count(100)->create(['role'=>'patient'])
        ->each(function ($u) {
            $u->patient()->save(Patient::factory()->create())
                ->appointments()->saveMany(Appointment::factory()->count(3)->create());
        });

    }
}
