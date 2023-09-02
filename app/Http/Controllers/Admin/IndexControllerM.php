<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class IndexControllerM extends Controller
{
    public function index() {
        return <<<php
        <h1>Точка входа для админа</h1>
        Тут какой-то текст<br>
        <a href="/">Переход на главную страницу</a>
        php;
    }
    public function test1() {
        return <<<php
        <h1>Test 1</h1>
        php;
    }
    public function test2() {
        return <<<php
        <h1>Test 2</h1>
        php;
    }
}
