<?php

namespace App\Http\Controllers;

use App\Events\DefineLoginEvent;
use App\Services\Interfaces\Social;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use function event;
use function redirect;
use function route;

class SocialProvidersController extends Controller
{
    public function redirect() {
        
        return Socialite::driver('vkontakte')->redirect();
    }
    
    public function callback(Social $socialService) {
        
        try { //если user ненайден в соц сети
            $socialUser = Socialite::driver('vkontakte')->user();
        } catch (Exception $ex) {
            return redirect('/login');
        }
        $user = $socialService->findOrCreateUser($socialUser);
        
        Auth::login($user,true); // авторизация $user
        event(new DefineLoginEvent($user));
        
        return redirect(route('home'));
    }
}
