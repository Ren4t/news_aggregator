@extends('layouts.admin')
@section("title") Главная @parent @stop
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Панель администратора</h1>
    
</div>
<x-alert :type="request()->query('t', 'light')" message='Some alert a message' ></x-alert>
<x-alert type="danger" message='Some alert a message'></x-alert>
<x-alert type="info" message='Some alert a message'></x-alert>
<x-alert type="success" message='Some alert a message'></x-alert>
<x-alert type="warning" message='Some alert a message'></x-alert>
<x-alert type="primary" message='Some alert a message'></x-alert>
@endsection
