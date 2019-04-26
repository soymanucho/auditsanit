<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Audit;
use App\User;
use App\Comment;

class NewComment extends Notification
{
    use Queueable;
    protected $audit;
    protected $comment;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Audit $audit,Comment $comment,User $user)
    {
      $this->audit = $audit;
      $this->comment = $comment;
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
        $url = url('/auditoria/'.$this->audit->id.'/detalle/paciente/');
        return (new MailMessage)
                    ->subject('Nuevo comentario en auditoría sanitaria')
                    ->greeting('Hola!')
                    ->line('Tenés un nuevo comentario en la auditoría n° '.$this->audit->id.', hace click en el siguiente botón para ir directamente.')
                    ->action('Ir a la auditoría', $url)
                    ->line($this->user->name.' dice: "'.$this->comment->text.'".')
                    ->line('Gracias por usar nuestra aplicación!')
                    ->salutation('Saludos!');
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
