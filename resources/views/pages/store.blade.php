@extends('layouts.index')

@section('content')
  <div class="row hero">
    @include('pages.hero')
  </div>

  <div class="row products">
    @include('pages.products')
  </div>
@endsection