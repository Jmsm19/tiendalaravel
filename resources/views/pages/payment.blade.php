@extends('layouts.index')

@section('content')
  <div class="row">
    <diva class="col col-xs-12 col-md-10">
      <div class="col col-xs-12">
        <div class="table-responsive cart-table">
          <table class="table">
            <thead class="thead-inverse">
              <tr>
                <th><h5>Summary</h5></th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
            @forelse ($cart as $item)
              <tr>
                <td scope="row" class="cart-image-col">
                  <a href="{{ route('details', ['id' => $item->id]) }}"><img src="{{ $item->options->image }}" alt="{{ $item->name }} logo" height="150px"></a>
                </td>
                <td>
                  <h6>
                    <p href="{{ route('details', ['id' => $item->id]) }}">{{ $item->name }}</p>
                  </h6>
                </td>
                <td>$ {{ $item->price }}</td>
                <td>{{ $item->qty }}</td>
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
      <div class="col col-xs-12">
        <div class="table-responsive cart-table">
          <table class="table">
            <thead class="thead-inverse">
              <tr>
                <th><h5>Address</h5></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">
                  <p>{{ $address->address1 }}</p>
                  <p>{{ $address->address2 }}</p>
                  <p>{{ $address->state }}, {{ $address->country }}</p>
                  <p>{{ $address->city }}, {{ $address->zip  }}</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </diva>

    <div class="col col-md-2 checkout-col text-right">        
        <button type="button" class="btn btn-primary btn-lg btn-block text-center" data-toggle="modal" data-target="#paymentModal">Payment</button>

        <br>
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
    </div>
  </div>
  @include('pages.inc.paymentModal')
@endsection