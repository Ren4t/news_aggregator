@extends('layouts.admin')
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
    </div>
</div>
<form method="post" action="{{ route('admin.news.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" class="form-control" id="title" value="">
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" name="author" class="form-control" id="author" value="">
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option>draft</option>
            <option>active</option>
            <option>blocked</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" class="form-control" id="desctiption"></textarea>
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