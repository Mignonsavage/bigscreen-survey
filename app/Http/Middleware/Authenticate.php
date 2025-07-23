<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Si la requête concerne une route de l'administration...
            if ($request->routeIs('admin.*')) {
                // ...on redirige vers la page de connexion de l'admin.
                return route('admin.login');
            }

            // Sinon, on garde le comportement par défaut (qui pourrait être utile plus tard).
            return route('login');
        }
        return null;
    }
}
