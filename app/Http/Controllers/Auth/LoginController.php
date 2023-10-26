<?php

namespace App\Http\Controllers\Auth;

use App\Events\DefineLoginEvent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use function event;

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
        $this->middleware('guest')->except('logout'); //маршрут для гостя убирается
    }
    
     protected function authenticated(Request $request, $user) //этод метод будет срабатывать кода пользователь был опознан
     //при входе через основную форму входа
    {
         //бросаем событие
        event(new DefineLoginEvent($user));//связать со слушателем LastLoginUpdateListener 
        //в провайдоре Providers/EventServiceProvider
    }
}
