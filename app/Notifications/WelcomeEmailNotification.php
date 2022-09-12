<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\User; 

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
                                ->greeting('Bonjour, '.$this->user->nom.' '.$this->user->prenom)
                                ->line('Votre compte est crée par votre administrateur, vous pouvez accéder à votre compte en utilisant comme Identifiant votre email (ex: exemple@carrezconseil.fr) et le mot de passe : ' .$this->user->storepassword)
                                ->action('se connecter', url('/login'))
                                ->line('Bienvenue à CARREZ CONSEIL ASSURANCES!')
                                ->line('Ceci est un email automatique merci de ne pas répondre.');
                                


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
