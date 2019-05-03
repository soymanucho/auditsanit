<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Audit;
use App\Auditor;
use App\User;
use App\MedicalService;

class DeclineMedicalService extends Notification
{
    use Queueable;
    protected $auditor;
    protected $audit;

     /* Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Auditor $auditor, Audit $audit )
    {
      $this->auditor = $auditor;
      $this->audit = $audit;

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
        $url = url('/auditoria/'.$this->audit->id.'/detalle/expediente');
        return (new MailMessage)
                    ->subject('Prestación Rechazada ')
                    ->greeting('Hola!')
                    ->line('El auditor/a '.$this->auditor->person->fullName().' rechazó auditar una prestación. Hace click en el siguiente botón para verla.')
                    ->action('Ver auditoría', $url)
                    ->line('Gracias por usar nuestra aplicación.')
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
