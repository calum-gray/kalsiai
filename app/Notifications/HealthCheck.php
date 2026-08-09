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
        $answers = json_decode($this->data['answers'] ?? '{}', true) ?? [];

        $message = (new MailMessage)
            ->subject('New AI Health Check submission')
            ->greeting('New health check via KalsiAI')
            ->line("Name: {$this->data['name']}")
            ->line("Email: {$this->data['email']}");

        foreach ($answers as $questionId => $value) {
            $message->line("{$questionId}: {$value}");
        }

        return $message->action('Reply now', 'mailto:' . $this->data['email']);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
