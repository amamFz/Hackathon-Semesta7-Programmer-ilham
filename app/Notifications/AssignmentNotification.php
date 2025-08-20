<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class AssignmentNotification extends Notification
{
    use Queueable;

    public $complain;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($complain, $type = "new")
    {
        $this->complain = $complain;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['telegram'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toTelegram($notifiable)
    {
        if (empty($notifiable->telegram_chat_id)) {
            return;
        }

        $text = match ($this->type) {
            'new' => "🔔 Ada keluhan baru: {$this->complain->title}",
            'late' => "⏰ Keluhan belum direspons 2 jam: {$this->complain->title}",
            'in_progress' => "🔄 Keluhan sedang diproses: {$this->complain->title}",
            'closed' => "✅ Keluhan telah ditutup: {$this->complain->title}",
            default => "Update keluhan: {$this->complain->title}",
        };

        return TelegramMessage::create()
            ->to($notifiable->telegram_chat_id)
            ->content($text);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
