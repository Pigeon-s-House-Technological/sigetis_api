<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

use App\Models\AsignacionEvaluacion;

class AsignacionNotificacion extends Notification
{
    use Queueable;
    private $accion;
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AsignacionEvaluacion $asignacion, $accion, $data)
    {
        $this -> asignacion = $asignacion;
        $this -> accion = $accion;
        $this -> data = $data;
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
            'asignacion_id' => $this -> asignacion -> id,
            'evaluacion_id' => $this -> asignacion -> id_evaluacion,
            'estado' => $this -> asignacion -> estado_evaluacion,
            'id_grupo' => $this -> asignacion -> id_grupo,
            'nombre_evaluacion' => $this -> data["nombre_evaluacion"],
            'accion' => $this -> accion,            
            'time' => Carbon::now() -> diffForHumans(),
        ];
    }
}
