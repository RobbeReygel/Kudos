<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class ComplimentReceived extends Notification
{
    use Queueable;

    public $compliment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($compliment)
    {
        $this->compliment=$compliment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return[
            'complimentTime'=>Carbon::now(),
            'content'=>$this->compliment
        ];
    }
    /*
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'thread'=>$this->thread,
            'user'=>auth()->user()
        ]);
    }
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
            //
        ];
    }
}
