<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacamte, $nombre_vacamte, $usuario_id)
    {
        $this->id_vacamte = $id_vacamte;
        $this->nombre_vacamte = $nombre_vacamte;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/candidatos/'.$this->id_vacamte);
        return (new MailMessage)
            ->line('Has recibido una nueva postulación para la vacante: ')
            ->line('La vacante es '. $this->nombre_vacamte)
            ->action('Ver Candidatos', $url)
            ->line('Gracias por tu interés.');
    }
    // Almacena la notificación en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'id_vacamte' => $this->id_vacamte,
            'nombre_vacamte' => $this->nombre_vacamte,
            'usuario_id' => $this->usuario_id,
        ];
    }
}
