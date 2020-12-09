<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class booking extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $appointment;
    public function __construct(Appointment $appointment)
    {
       $this->appointment=$appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'appointment_id'=>$this->appointment->id,
            'patient_name'=>$this->appointment->patient->user->name,
            'patient_id'=>$this->appointment->patient->user->id,
            'patient_image'=>$this->appointment->patient->user->image,
            'content'=>'Patient ' . $this->appointment->patient->user->name.' Is Booked A Date '. $this->appointment->day .' '.$this->appointment->time ,
        ];
    }
}
