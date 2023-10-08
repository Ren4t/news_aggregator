@extends('layouts.admin')
@section("title") Редактировать пользователя @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
@if($errors->any()) <!-- вывод массива ошибок валидации -->
        @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
@include('inc.message')
<form  method="post" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p>Имя</p>
    <p>{{ $user->name }}</p>
    <p>Почта</p>
    <p>{{ $user->email }}</p>
    <div class="form-group">
        <label for="is_admin">Admin</label>
        <select class="form-control" name="is_admin" id="is_admin">
              <option @selected(old('is_admin') === false || $user->is_admin === false )>false</option>
              <option @selected(old('is_admin') === true || $user->is_admin === true)>true</option>
        </select>
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
