<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrModoMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->user() && $request->user()->isAdmin() || $request->user()->isModerator()) {
            return $next($request);
        }

        abort(403, 'Accès refusé.'); // Redirection si l'utilisateur n'est pas un administrateur
    }
}
