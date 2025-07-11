<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect path if not using custom logic.
     * This will be overridden by `authenticated()` method.
     */
    protected $redirectTo = '/home';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override this method to handle post-login redirection
     * based on user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Cek apakah user adalah admin
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        // Jika bukan admin, berarti user biasa → redirect ke klien
        return redirect()->route('klien.index');
    }
}
