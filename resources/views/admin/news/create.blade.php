@extends('layouts.admin')
@section("title") Добавит новость @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
    </div>
</div>
<x-alert :type="request()->query('t', 'light')" :message="request()->query('m', 'Все поля к заполнению')" :show="request()->query('s', ' ')"></x-alert>
<form  method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}">
    </div>
    <div class="form-group">
        <label for="img_url">image_url</label>
        <input type="file" name="img_url" class="form-control" id="img_url" }}">
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option @if(old('status') === 'draft') selected @endif>draft</option>
            <option @if(old('status') === 'active') selected @endif>active</option>
            <option @if(old('status') === 'blocked') selected @endif>blocked</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control" id="desctiption">{{ old('description') }}</textarea>
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
