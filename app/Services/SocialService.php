<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\Social;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{
    
    public function findOrCreateUser(SocialUser $socialUser): User {
        
        $user = User::query()->where('email','=',$socialUser->getEmail())->first();
        if(!$user){ //если не зарегистрирован
            $user = User::create([ // добавить в базу данных
               'email' => $socialUser->getEmail(),
                'name' => $socialUser->getName(),
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make('secret') //пароль конечно нужно менять
            ]);
        }
        
        $user->avatar = $socialUser->getAvatar();
        //dd($user);
        $user->save();
        
        return $user;
    }

}
