@extends('layouts.main') <!-- main.blaid.php -->
@section("title") Список новостей @parent @stop
@section('content') {{-- @yield('content') --}}

 <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light" style="font-size: 128px">Новости</h1>
        
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news) <!-- 'newsList' => $this->getNews() -->
        <div class="col">
          <div class="card shadow-sm">
              <p><strong>{{ $news->title }}</strong></p>
              <img src="{{ $news->image }}" alt="image"/>
            <div class="card-body">
              <p class="card-text">{{ $news->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('news.show',['id' => $news->id])}}" class="btn btn-sm btn-outline-secondary">Show</a>
                </div>
                <small class="text-muted">{{$news->author}} ({{$news->created_at}})</small>
              </div>
            </div>
          </div>
        </div>
        @empty
        <h2>Новостей нет</h2>
        @endforelse
      
      </div>
    </div>
  </div>
@endsection
