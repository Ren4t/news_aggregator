@extends('layouts.admin')
@section("title") Добавит категорию @parent @stop
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
    </div>
</div>

<form method="post" action="{{ route('admin.categories.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Категория</label>
        <input type="text" name="title" class="form-control" id="title" value="">
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