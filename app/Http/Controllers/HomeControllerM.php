<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class HomeControllerM extends Controller
{
    public function index() {
        return <<<php
        <h1>Приветствие пользователя</h1>
        Тут какой-то текст<br>
        <a href="/news"><h2>Новости</h2></a><br>
        <a href="/admin">Переход на admin страницу</a>
        php;
    }
}
