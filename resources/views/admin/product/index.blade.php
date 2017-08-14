@extends('admin.layouts.dashboard')

@section('products')
    <h4>Products</h4>
    <br>
    <div id="accordion" role="tablist" aria-multiselectable="true">
      @forelse ($products as $product)
        <div class="card">
          <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapser{{ $product->id }}" aria-expanded="true" aria-controls="collapseOne">
                {{ $product->name }}
              </a>
            </h5>
          </div>

          <div id="collapser{{ $product->id }}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block">
              <div class="media">
                <img class="d-flex mr-3" src="/img/{{ $product->image }}" alt="{{ $product->name }} logo">
                <div class="media-body">
                  <h6>Price</h6>
                  <p>$ {{ $product->price }}</p>
                  <h6>Category</h6>
                  <p>{{ $product->category->name }}</p>
                  <h6>Description</h6>
                  <p>{{ $product->description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
    @endforelse
@endsection