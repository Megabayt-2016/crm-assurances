<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormLinkNotification extends Notification
{
    use Queueable;

    public $user;
    public $link;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($link)
    {
//        $this->user = $user;
        $this->link = $link;
        // $this->locale = $this->link->locale;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->subject('Demande de documents')
            ->greeting('Bonjour '. $notifiable->nom)
            ->line('Afin de finaliser votre demande, veuillez indexer vos pieces sur le lien ci-dessous !')
            ->action('Remplir le formulaire', url($this->link))
            ->salutation('Cordialement,
             Carrez Conseil Assurances')
            ->line('Merci.');
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
            'link' => $this->link,
        ];
    }
}
