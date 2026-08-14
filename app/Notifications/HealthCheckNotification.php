<?php

namespace App\Notifications;

use App\Models\HealthCheck;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HealthCheckNotification extends Notification
{
    use Queueable;

    protected HealthCheck $submission;

    public function __construct(HealthCheck $submission)
    {
        $this->submission = $submission;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject('New AI Health Check submission')
            ->greeting('New health check via KalsiAI')
            ->line("Name: ". $this->submission->name)
            ->line("Email: ". $this->submission->email);

        foreach ($this->submission->answers as $questionId => $value) {
            $message->line("{$questionId}: {$value}");
        }

        return $message->action('Reply now', 'mailto:' . $this->submission->email);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
