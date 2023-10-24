<?php

namespace App\Services\Interfaces;

use App\Models\User;// user из модели
use Laravel\Socialite\Contracts\User as SocialUser; // user который приходит из сети


interface Social {
    public function findOrCreateUser(SocialUser $socialUser): User;
}
