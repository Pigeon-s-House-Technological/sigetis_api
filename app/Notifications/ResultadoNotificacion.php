<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

use App\Models\Elemento;
use App\Models\Observacion;

class ResultadoNotificacion extends Notification
{
    use Queueable;
    private $accion;
    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Elemento $resultado, $accion, Observacion $observacion, $data)
    {
        $this -> resultado = $resultado;
        $this -> accion = $accion;
        $this -> data = $data;
        $this -> observacion = $observacion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'id_observacion' => $this -> observacion -> id,
            'id_resultado' => $this -> resultado -> id,
            'nombre_actividad' => $this->data['nombre_actividad'],
            'nombre_grupo' => $this->data['grupo'],
            'accion' => $this -> accion,
            'time' => Carbon::now() -> diffForHumans(),
        ];
    }
}
