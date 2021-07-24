<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function redirectTo()
   {
     if(Auth::user()->is_admin == 1 && Auth::user()->is_active == 1){
       $this->redirectTo = '/home-admin';
       return $this->redirectTo;
     }elseif (Auth::user()->is_ecerdb_personnel == 1 && Auth::user()->is_active == 1) {
       $this->redirectTo = '/home-admin';
       return $this->redirectTo;
     }elseif (Auth::user()->is_student == 1 && Auth::user()->is_active == 1) {
       $this->redirectTo = '/home';
       return $this->redirectTo;
     }else {
       $this->redirectTo = '/';
       return $this->redirectTo;
     }
   }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

          $user_active = User::where('ic_number',$request->ic_number)->first();
          if($user_active){
            if($user_active->is_active == 0)
            {
              return redirect('/login')->with("error", "Your account has been deactived. Please contact the admin for account activation.");
            }
            if ($user_active->is_approved == 0) {
                return redirect('/login')->with("error", "Your account has not been approved. Please contact the admin for account approval.");
            }

           if ($this->attemptLogin($request)) {
               return $this->sendLoginResponse($request);
           }
          }

         // If the login attempt was unsuccessful we will increment the number of attempts
         // to login and redirect the user back to the login form. Of course, when this
         // user surpasses their maximum number of attempts they will get locked out.
         $this->incrementLoginAttempts($request);

         return $this->sendFailedLoginResponse($request);
     }

     public function username()
     {
         return 'ic_number';
     }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
      $user = User::findOrFail(Auth::user()->id);
      // dd($user);
      if($user->first_time_login)
      {
        $user->first_time_login = 0;
        $user->save();
      }
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/login');
  }


}
