@extends('admin.layouts.dashboard')

@section('products')
    <div class="row">
      <div class="col col-md-9">
        <h4>Products</h4>
      </div>
      @if(!empty($categories))
        <div class="col col-md-2">
          <div class="dropdown">
            <a class="btn btn-secondary btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort by
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('admin/product/') }}">All</a>
            @foreach($categories as $category)
              <a class="dropdown-item" href="{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
            </div>
          </div>
        </div>
      @endif
    </div>
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
    {{ $products->links() }}
@endsection