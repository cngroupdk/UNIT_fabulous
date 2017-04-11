<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class MailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Notifiable;

    public $user, $subject, $message, $specEmail;

    /**
     * MailEvent constructor.
     *
     * @param User|null $user
     * @param           $subject
     * @param           $message
     * @param null      $specEmail
     */
    public function __construct(User $user = null, $subject, $message, $specEmail = null)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->message = $message;
        $this->specEmail = $specEmail;
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->user != null ? $this->user->email : $this->specEmail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
