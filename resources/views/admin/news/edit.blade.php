@extends('layouts.admin')
@section("title") Редактировать новость @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
@if($errors->any()) <!-- вывод массива ошибок валидации -->
        @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
@include('inc.message')
<form  method="post" action="{{ route('admin.news.update',$news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ old('title')?? $news->title }}">
    </div>
    <div class="form-group">
        <label for="category_id">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id || $news->category_id == $category->id)> 
                                           <!-- @if($category->id == old('category_id'))selected @endif; -->
            {{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" name="author" class="form-control" id="author" value="{{ old('author') ?? $news->author }}">
    </div>
    <div class="form-group">
        <label for="img_url">image_url</label>
        <img src="{{ $news->image }}" alt="image" width='100'/>
        <input type="file" name="img_url" class="form-control" id="img_url">
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option @selected(old('status') === 'draft' || $news->status === 'draft')>draft</option>
            <option @selected(old('status') === 'active' || $news->status === 'active')>active</option>
            <option @selected(old('status') === 'blocked' || $news->status === 'blocked')>blocked</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control" id="desctiption">{{ old('description') ?? $news->description}}</textarea>
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
