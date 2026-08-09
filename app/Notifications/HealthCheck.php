<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HealthCheck extends Notification
{
    use Queueable;

    protected array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact from ' . $this->data['name'])
            ->greeting('New Enquiry for KalsiAI')
            ->line("Name: {$this->data['name']}")
            ->line("Email: {$this->data['email']}")
            ->line("Message: {$this->data['message']}")
            ->action('Reply Now: ', 'mailto:'. $this->data['email']);

    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
