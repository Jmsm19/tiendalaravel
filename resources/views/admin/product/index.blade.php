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
              <a class="dropdown-item" href="{{ route('product.show', [$category->id]) }}">{{ $category->name }}</a>
            @endforeach
            </div>
          </div>
        </div>
      @endif
    </div>
    @if(!$sorted)
      {{ $products->links() }}
    @endif
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
                <img class="d-flex mr-3 rounded" src="/img/{{ $product->image }}" alt="{{ $product->name }} logo">
                <div class="media-body">
                  <h6>Price</h6>
                  <p>$ {{ $product->price }}</p>

                  <h6>Category</h6>
                  @if(empty($product->category->name))
                      <p>No category</p>
                  @else
                    <p>{{ $product->category->name }}</p>
                  @endif
                  
                  <h6>Description</h6>
                  <p>{{ $product->description }}</p>

                  <br>
                  
                  <div class="row">
                    <div class="col col-md-3 offset-md-2">
                      {!! Form::open(array('route' => ['product.edit', $product->id ], 'class'=> 'form', 'method' => 'get')) !!}
                      {!! Form::button('<i class="fa fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-info btn-block'] ) !!}
                      {!! Form::close() !!}
                    </div>
                    <div class="col col-md-3 offset-md-1">
                      {!! Form::open(array('route' => ['product.destroy', $product->id ], 'class'=> 'form', 'method' => 'delete')) !!}
                      {!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-block'] ) !!}
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
      <h5>No products available yet.</h5>
    @endforelse    
@endsection