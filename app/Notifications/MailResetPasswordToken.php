<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
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
        return (new MailMessage)
                    ->subject('Sol·licitud de restabliment de contrassenya')
                    ->greeting('Hola!')
                    ->line('Estàs rebent aquest correu perquè has sol·licitat restablir la teva contrassenya.')
                    ->action('Restableix la contrassenya', url('reset-password/'.$this->token))
                    ->line('L\'enllaç caducarà en '.config('auth.passwords.'.config('auth.defaults.passwords').'.expire') . ' minuts.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
                    ->line('Si no has sol·licitat aquesta acció, simplement ignora el missatge i no prenguis cap acció addicional.')
                    ->salutation("Gràcies per fer servir la nostra aplicació!");
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
