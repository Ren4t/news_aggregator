@extends('layouts.main')
@section("title") Новости по категориям @parent @stop
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <img src="{{ $news['image']}}" alt="image"/>
        <h2><strong>{{ $news['title'] }}</strong></h2>
        <p>{!! $news['description']!!}</p>
        <p>{{$news['author']}}</p> 
        <p>{{$news['created']}}</p>
        <p>{{ $news['status'] }}</p>
    </div>
</div>
@endsection

