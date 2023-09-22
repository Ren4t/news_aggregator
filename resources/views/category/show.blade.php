@extends('layouts.main') <!-- main.blaid.php -->
@section("title") Категория @parent @stop
@section('content') {{-- @yield('content') --}}

<div class="album py-5 bg-light">
    <div class="container">
                    <h2><strong>{{ $category->title }}</strong></h2>
                    <p>{{ $category->description}}</p>
                    <br>
        
    </div>
</div>
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
                    <a href="{{route('news.show', $news)}}" class="btn btn-sm btn-outline-secondary">Show</a>
                    <!-- $news - извлечется первичный ключ сам из модели -->
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

