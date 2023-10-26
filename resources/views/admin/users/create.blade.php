@extends('layouts.admin')
@section("title") Добавит пользователя @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
@if($errors->any()) <!-- вывод массива ошибок валидации -->
        @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
@include('inc.message')
<form  method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
        @error('name') <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror 
        <!-- из шаблона подставлятся текст ошибки -->
    </div>
    <div class="form-group">
        <label for="email">Почта</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
        @error('email') <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror 
        <!-- из шаблона подставлятся текст ошибки -->
    </div>
    <div class="form-group">
        <label for="is_admin">Admin</label>
        <select class="form-control" name="is_admin" id="is_admin">
              <option @selected(old('is_admin') === false)>false</option>
              <option @selected(old('is_admin') === true)>true</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
    </div>
    <div class="form-group">
        <label for="password-confirm">Повторить пароль</label>
        <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required autocomplete="new-password">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection


{{--@push('js')
<script>
    alert("Add news!!!");
</script>
@endpush--}}
