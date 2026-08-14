<?php

namespace App\Notifications;

use App\Models\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    protected ContactForm $submission;

    public function __construct(ContactForm $submission)
    {
        $this->submission = $submission;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact from ' . $this->submission->name)
            ->greeting('New Enquiry for KalsiAI')
            ->line("Name: ". $this->submission->name)
            ->line("Email: " . $this->submission->email)
            ->line("Message: ". $this->submission->message)
            ->action('Reply Now: ', 'mailto:'. $this->submission->email);

    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
