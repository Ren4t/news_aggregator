@extends('layouts.admin')
@section("title") Редактировать категорию @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
@if($errors->any()) <!-- вывод массива ошибок валидации -->
        @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
@include('inc.message')
<form  method="post" action="{{ route('admin.categories.update',$category) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Категория</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title')?? $category->title }}">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control" id="desctiption">{{ old('description') ?? $category->description}}</textarea>
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
