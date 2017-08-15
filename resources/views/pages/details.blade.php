@extends('layouts.index')

@section('content')
  <div class="row details-section">
    <div class="left col col-xs-12 col-md-4">
      <img src="/img/{{ $product->image }}">
    </div>

    <div class="right col col-xs-12 col-md-8">
    
      <div class="row">
        <div class="col col-xs-12 col-md-8">
          <h3>{{ $product->name }}</h3>
        </div>
        <div class="col col-xs-12 col-md-4">
          <h5>$ {{ $product->price }}</h5>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <p class="category">{{ $product->category->name }}</p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <p>{{ $product->description }}</p>
        </div>
      </div>

      <div class="row">
        <div class="col col-md-3">
          <a class="btn btn-secondary" href="{{ route('store') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Store
          </a>
        </div>
        <div class="col col-md-3 push-md-6">
          <a class="btn btn-primary btn-block" href="{{ route('cart.edit', $product->id) }}">
            <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart
          </a>
        </div>
      </div>

    </div>
  </div>
@endsection