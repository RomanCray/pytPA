<?php

namespace App\Http\Middleware;

use App\Models\Edificio;
use App\Models\Proyecto;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RouteRevision
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $action): Response
    {
        // dd($request->route('proyect'));
        switch ($action) {
            case 'checkEdificio':
                $this->checkEdificio($request);
                break;

            case 'checkTrabajoEdificio':
                $this->checkTrabajoEdificio($request);
                break;

            default:
                abort(403, 'Acción no permitida.');
        }

        return $next($request);
    }

    protected function checkEdificio($request)
    {
        $proyectoID = $request->route('proyect');
        $proyecto = Proyecto::find($proyectoID);

        if (!$proyecto || $proyecto->user !== Auth::id()) {
            abort(403, 'No tienes acceso a este recurso.');
        }
    }

    protected function checkTrabajoEdificio($request)
    {
        $EdificioID = $request->route('id_edificio');
        $proyectoID = Edificio::where('id', $EdificioID)->value('id_proyecto');
        $proyecto = Proyecto::find($proyectoID);

        if (!$proyecto || $proyecto->user !== Auth::id()) {
            abort(403, 'No tienes acceso a este recurso.');
        }
    }
}
