<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/espace-membre';


    public function redirectTo ()
    {
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();
        // CONNECTE COMME MEMBRE (level == 1)
        if ($utilisateurConnecte != null 
                && $utilisateurConnecte->level == 1)
        {
            return '/espace-membre';
        }
        // CONNECTE COMME ADMIN (level == 2)
        if ($utilisateurConnecte != null 
                && $utilisateurConnecte->level == 2)
        {
            return '/espace-admin';
        }
        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
