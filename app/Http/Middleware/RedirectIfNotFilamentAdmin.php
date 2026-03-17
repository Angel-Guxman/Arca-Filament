<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;

class RedirectIfNotFilamentAdmin extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request):Response $next
     */
    protected function authenticate($request, array $guards)
    {
        $auth = Filament::auth();

        if (!$auth->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse(Filament::getAuthGuard());

        /** @var Model $user */
        $user = $auth->user();

        $panel = Filament::getCurrentOrDefaultPanel();

        if ($user instanceof FilamentUser) {
            if (!$user->canAccessPanel($panel) && config('app.env') !== 'local') {
                return redirect(route('home'));
            }
        }
    }

    protected function redirectTo($request): ?string
    {
          return Filament::getLoginUrl();
    }
}
