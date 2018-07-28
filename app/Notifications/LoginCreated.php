<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class LoginCreated 
 * 
 * @package App\Notifications
 */
class LoginCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var \App\User $user */
    public $user;

    /** @var string $password */
    public $password;

    /**
     * Max attempts for the job. 
     * 
     * @var int $tries
     */
    public $tries = 5;

    /**
     * Create a new notification instance.
     *
     * @param  User $user The user resource entity 
     * @return void
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable The notification builder instance
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable The notification builder instance
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('There is created an login for u on ' . config('app.name'))
            ->greeting("Hello {$this->user->firstname} {$this->user->lastname},")
            ->line("Some admin has created an login for u on {{ config('app.name') }}. You can login with the following password.")
            ->line("**Password:** {$this->password}")
            ->action('Go to website', config('app.url'));
    }
}
