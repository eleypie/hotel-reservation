<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class LoginController extends Controller
{
    use HasRoles;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login POST
public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $user = Auth::user();

        // Redirect based on role
        if ($user->hasRole('Super Admin')) {
            return redirect()->route('superadmin-dashboard');
        } elseif ($user->hasRole('Admin')) {
            return redirect()->route('admin-dashboard');
        } elseif ($user->hasRole('Receptionist')) {
            return redirect()->route('receptionist-dashboard');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user-dashboard'); // or $this->redirectTo
        } else {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Unauthorized role.']);
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput($request->only('email', 'remember'));
}

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}