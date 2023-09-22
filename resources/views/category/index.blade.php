@extends('layouts.main') <!-- main.blaid.php -->
@section("title") Список категорий @parent @stop
@section('content') {{-- @yield('content') --}}
<div class="container">
    <br>
    <h1 class="fw-light"><strong>Список категорий</strong></h1> 
</div>      

<div class="album py-5 bg-light">
    <div class="container">
 @forelse($categories as $category) 
                    <h2><strong>{{ $category->title }}</strong></h2>
                    <p >{{ $category->description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{route('category.show',$category)}}" class="btn btn-sm btn-outline-secondary">Show</a>
                        </div>
                    </div>
                    <br>
        @empty
        <h2>Категорий нет</h2>
        @endforelse
    </div>
</div>
@endsection

