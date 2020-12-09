<?php

namespace App\Notifications;

use App\Models\Appointment;
use App\Models\AppointmentTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class bookingstate extends Notification
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
            'doctor_name'=>$this->appointment->clinic->doctor->user->name,
            'doctor_username'=>$this->appointment->clinic->doctor->user->username,
            'doctor_image'=>$this->appointment->clinic->doctor->user->image,
            'content'=>'Doctor ' . $this->appointment->clinic->doctor->user->name.'  '.$this->appointment->state.'  Your Booking  Date '. $this->appointment->day .' '.$this->appointment->time ,
        ];
    }
}
