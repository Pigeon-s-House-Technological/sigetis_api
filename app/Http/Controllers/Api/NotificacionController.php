<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacion::all();

        return response()->json([
            'notificaciones' => $notificaciones
        ]);
    }

    public function marcarLeida(Request $request)
    {
        $notificacion = Notificacion::find($request->id);

        $notificacion->markAsRead();

        return response()->json([
            'notificacion' => $notificacion
        ]);
    }

    public function marcarTodasLeidas(Request $request)
    {
        $notificaciones = Notificacion::where('notifiable', $request->id)->get();

        foreach ($notificaciones as $notificacion) {
            $notificacion->markAsRead();
        }

        return response()->json([
            'notificaciones' => $notificaciones
        ]);
    }

    public function indexUsuario($id)
    {
        $notificaciones = Notificacion::where('notifiable_id', $id)->get();

        // No es necesario convertir el ID a cadena si ya es un UUID
        return response()->json([
            'notificaciones' => $notificaciones
        ]);
    }
}
