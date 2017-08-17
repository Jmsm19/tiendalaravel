@extends('layouts.index')

@section('content')
  <div class="row">
    <div class="col col-xs-12 col-md-10">
      <div class="table-responsive cart-table">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th width="180px"><h5>Shopping Cart</h5></th>
              <th></th>
              <th>Price</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($cart as $item)
            <tr>
              <td scope="row" class="cart-image-col">
                <a href="{{ route('details', ['id' => $item->id]) }}"><img src="/img/{{ $item->options->image }}" alt="{{ $item->name }} logo" height="150px"></a>
              </td>
              <td>
                <h6>
                  <a href="{{ route('details', ['id' => $item->id]) }}">{{ $item->name }}</a>
                </h6>
                {!! Form::open(array('route' => ['cart.destroy', $item->rowId ], 'class'=> 'form', 'method' => 'delete')) !!}
                {!! Form::button('<i class="fa fa-trash"></i> Remove', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                {!! Form::close() !!}
              </td>
              <td>$ {{ $item->price }}</td>
              <td>
                {!! Form::open(array('route' => ['cart.update', $item->rowId ], 'class'=> 'form', 'method' => 'put')) !!}
                {!! Form::select('qty', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], $item->qty, ['class' => 'form-control cart-select', 'onchange' => 'this.form.submit()']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @empty
              <tr>
              <td scope="row">Cart empty</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="col col-md-2 checkout-col text-right">
      @if(Cart::count() >= 1)
        <a type="button" class="btn btn-default btn-lg btn-block text-center checkout-btn" href="{{ url('/purchase') }}">Checkout</a>
        <h6 class="subtotal">Subtotal ({{ Cart::count() }}
        @if(Cart::count() == 1)
          item)</h6>
        @else
          items)</h6>
        @endif
        <p>$ <spam class="total">{{ Cart::subtotal() }}</spam></p>
        
        <h6>Tax (12%)</h6>
        <p>$ {{ Cart::tax() }}</p>
        
        <hr>
        
        <h6>Total</h6>
        <p>$ {{ Cart::total() }}</p>
      @endif
    </div>
  </div>
@endsection