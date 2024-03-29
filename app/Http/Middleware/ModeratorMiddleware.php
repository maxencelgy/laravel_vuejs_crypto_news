<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ModeratorMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->user() && $request->user()->isModerator()) {
            return $next($request);
        }


        abort(403, 'Accès refusé.'); // Redirection si l'utilisateur n'est pas un administrateur
    }
}
