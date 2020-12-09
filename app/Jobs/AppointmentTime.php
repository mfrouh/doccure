<?php

namespace App\Jobs;

use App\Models\AppointmentTime as ModelsAppointmentTime;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AppointmentTime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $clinic;
    public function __construct(Clinic $clinic)
    {
        $this->clinic=$clinic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i=0; $i < $this->clinic->type_booking; $i++) {
            $checkday=Carbon::now()->addDays($i)->format('D');
            if(in_array($checkday,json_decode($this->clinic->days_work))){
            $open=Carbon::parse($this->clinic->open)->format('h:i:s');
            $close=Carbon::parse($this->clinic->close)->format('h:i:s');
            $j=0;
                do {
                    $day=Carbon::now()->addDays($i);
                    $open=Carbon::parse($this->clinic->open)->addMinutes($j*$this->clinic->time_appointment)->format('h:i:s');
                    $close=Carbon::parse($this->clinic->close)->format('h:i:s');
                    $appointment_time=new ModelsAppointmentTime();
                    $appointment_time->clinic_id=$this->clinic->id;
                    $appointment_time->day=$day;
                    $appointment_time->time=$open;
                    $appointment_time->save();
                    $j++;

                } while ($close > $open);
            }
          }
    }
}
