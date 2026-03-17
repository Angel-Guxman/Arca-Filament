<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class StorePendingPurchase
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // Si el usuario NO está autenticado y la petición incluye datos de compra
        if (!Auth::check() && $request->has(['product_slug', 'quantity'])) {
            // Guardar en sesión
            session([
                'pending_purchase' => [
                    'slug' => $request->input('product_slug'),
                    'quantity' => (int) $request->input('quantity'),
                ]
            ]);

            // Redirigir al login
            return redirect()->route('login');
        }

        return $next($request);
    }
}
