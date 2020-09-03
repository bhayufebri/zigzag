<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;



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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $group = User::where('email', $request->email)
            // ->whereHas('group', function($q){
            //     $q->where('group_id', '=', 1);
            //     })
            ->where('permissions', 'admin')
        ->get();
        $group_cust = User::where('email', $request->email)
            // ->whereHas('group', function($q){
            //     $q->where('group_id', '=', 1);
            //     })
            ->where('permissions', 'customer')
        ->get();
        // dd($group[0]->first_name);
        // dd($this->attemptLogin($request));
        // return json_encode($group_cust[0]->first_name);
        \Log::info(count($group));

        if ((count($group) > 0) && $this->attemptLogin($request)  ) {
            // return $this->sendLoginResponse($request);
            flash('Welcome to Tiketku CMS ' . $group[0]->first_name .' '. $group[0]->last_name)->success();
            return redirect('/home');
    
        }
        if ((count($group_cust) > 0) && $this->attemptLogin($request)  ) {
            // return $this->sendLoginResponse($request);
            flash('Welcome to Tiketku CMS ' . $group_cust[0]->first_name)->success();
            return redirect('/customer/index');
    
        }
        if ((count($group) == 0)  ) {
            // return $this->sendLoginResponse($request);
            flash('Gagal')->error();
            // return redirect('/home');
        return back()->withErrors('These credentials do not match our records.');

        // return redirect('/login');

    
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        
        return $this->sendFailedLoginResponse($request);
        // return redirect('/login');
        // return back()->withErrors('your error message');
        // return Redirect::back()->withErrors('Undefined user');

    }
}
