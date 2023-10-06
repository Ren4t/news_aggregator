@extends('layouts.admin')
@section("title") Добавит новость @parent @stop
{{--@dump(old())--}}
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
</div>
@if($errors->any()) <!-- вывод массива ошибок валидации -->
        @foreach($errors->all() as $error)
    <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
@include('inc.message')
<form  method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
        @error('title') <div id="validationServerUsernameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror 
        <!-- из шаблона подставлятся текст ошибки -->
    </div>
    <div class="form-group">
        <label for="category_id">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)> 
                                           <!-- @if($category->id == old('category_id'))selected @endif; -->
            {{ $category->title }}</option>
            @endforeach
        </select>
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
