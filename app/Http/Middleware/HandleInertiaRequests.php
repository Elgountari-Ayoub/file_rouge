<?php

namespace App\Http\Middleware;

use App\Models\User;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */

    public function getUserRole()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return $user->role;
        } else {
            return 'guest';
        }
    }
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'userRole' => $this->getUserRole(),
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'canLogout' => Route::has('logout'),
            // // Synchronously...
            // 'appName' => [config('app.name'),],

            // // Lazily...
            // 'auth.user' => fn () => $request->user()
            //     ? $request->user()->only('id', 'name', 'email')
            //     : null,
        ]);
    }
}
