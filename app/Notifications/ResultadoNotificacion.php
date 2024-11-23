<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

use App\Models\Resultado;

class ResultadoNotificacion extends Notification
{
    use Queueable;
    private $accion;
    private $nombre_actividad;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Resultado $resultado, $accion, $nombre_actividad)
    {
        $this -> resultado = $resultado;
        $this -> accion = $accion;
        $this -> nombre_actividad = $nombre_actividad;
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
            'actividad_resulado' => $this -> resultado -> id,
            'id_actividad' => $this -> resultado -> id_actividad,
            'nombre_grupo'  => $this -> resultado -> grupo,
            'nombre_creador' => $this -> resultado -> creador,
            'accion' => $this -> accion,
            'time' => Carbon::now() -> diffForHumans(),
        ];
    }
}
