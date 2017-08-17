@extends('layouts.index')

@section('content')
  <div class="row hero">
    @include('pages.hero')
  </div>

  @if(Session::has('message'))
  <p class="alert alert-info">{{ Session::get('message') }}</p>
  @endif

  <div class="row products">
    @include('pages.products')
  </div>
@endsection