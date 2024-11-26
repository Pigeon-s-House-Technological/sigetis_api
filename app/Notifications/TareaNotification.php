<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

use App\Models\Actividad;

class TareaNotification extends Notification
{
    use Queueable;
    private $accion;
    private $id_grupo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Actividad $actividad, $accion, $id_grupo)
    {
        $this -> actividad = $actividad;
        $this -> accion = $accion;
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
            'actividad_id' => $this -> actividad -> id,
            'actividad' => $this -> actividad -> nombre_actividad,
            'fecha_inicio' => $this -> actividad -> fecha_inicio,
            'fecha_fin' => $this -> actividad -> fecha_fin,
            'nombre_grupo'  => $this -> actividad -> grupo,
            'nombre_creador' => $this -> actividad -> creador,
            'accion' => $this -> accion,
            'id_grupo' => $this -> id_grupo,
            'time' => Carbon::now() -> diffForHumans(),
        ];
    }
}
