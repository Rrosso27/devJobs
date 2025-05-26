<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Aquí puedes manejar la lógica para mostrar las notificaciones

        $noftificaciones = auth()->user()->unreadNotifications;
        // Limpiar las notificaciones leídas
        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index', [
            'notificaciones' => $noftificaciones,
        ]);
    }
}
