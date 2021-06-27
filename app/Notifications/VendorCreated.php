<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Vendor;
use Illuminate\Support\Facades\Config;

class VendorCreated extends Notification
{
    use Queueable;

    public $vendor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vendor $vendor)
    {
        $this -> vendor = $vendor;
        // $vendor coming from controller and saving from variable $this->vendot public 
    }

    /**
     * Get the notification's delivery channels.
     * i can write save notificatino in db or sent just to email
     * return ['mail','sms','database',.......];

     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject  = sprintf('%s Done Created Your Account In WebSite : %s', config('app.name'), $this->vendor->name);
        $greeting = sprintf('Hello %s!', $notifiable->name);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

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
