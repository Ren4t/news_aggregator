@extends('layouts.main') <!-- main.blaid.php -->
@section("title") Новости @parent @stop
@section('content') {{-- @yield('content') --}}
<div class="container my-5">
  <div class="p-5 text-center bg-body-tertiary rounded-3">
    <svg class="bi mt-4 mb-3" style="color: var(--bs-indigo);" width="100" height="100"><use xlink:href="#bootstrap"></use></svg>
    <h1 class="text-body-emphasis">Агрегатор новостей</h1>
    <p class="col-lg-8 mx-auto fs-5 text-muted">
        {{ __('Magnam rerum aut molestias necessitatibus dolor. Reiciendis est laboriosam est consectetur iure hic sit. Non autem architecto omnis nulla cupiditate omnis.') }}
      </p>
    <div class="d-inline-flex gap-2 mb-5">
        <a class="btn btn-outline-secondary btn-lg px-4 rounded-pill" href="{{ route('news.index')}}">
        Show news
      </a>
    </div>
  </div>
</div>
@endsection