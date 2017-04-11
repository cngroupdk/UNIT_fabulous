<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Registration extends Notification
{
    use Queueable;

    private $user;
    private $password;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->success()
            ->from(env('MAIL_USERNAME'), env('APP_NAME'))
            ->greeting(trans('emails.welcome_email.message.greetings', ['name' => $this->user->email]))
            ->subject(trans('emails.subject_prefix').' '.trans('emails.welcome_email.title'))
            ->line(trans('emails.welcome_email.message.introduction'))
            ->action(trans('emails.welcome_email.message.action'), action('Auth\LoginController@login'))
            ->line(trans('emails.welcome_email.message.password', ['password' => $this->password]))
            ->line(trans('emails.welcome_email.message.thanks'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
