@extends('layouts.index')

@section('content')
    <main class="container">
      <div class="row">
          <div class="col col-md-6 offset-md-3">
          <h3 class="display-5">Shipping Address</h3>
        </div>
      </div>

      <br>

      <div class="row addresses">
        <div class="col col-md-12 row">
          @if(count($addresses) >= 1)
            @foreach($addresses as $address)
            <div class="col col-md-3">
              <div class="card address">
                <div class="card-block">
                  <h5 class="card-title">Address #{{ $loop->index + 1 }}</h5>
                  <p class="card-text">
                    {{ $address->address1 }} <br>
                    {{ $address->state }}, {{ $address->country }}<br>
                    {{ $address->city }}, {{ $address->zip }}
                  </p>
                  <a href="{{ route('checkout.payment', ['id' => $loop->index]) }}" class="btn btn-primary btn-block">Use this</a>
                </div>
              </div>
            </div>
            @endforeach
            <div class="col col-md-2">
              <button class="btn btn-default new-address-btn v-middle"><i class="fa fa-plus"></i> New address</button>
            </div>
          @else
            <div class="col col-md-6 offset-md-3">
              @include('pages.inc.addressForm')
            </div>
          @endif    
        </div>
      </div>

      <div class="row form">
        <div class="col col-md-6 offset-md-3">
          <div class="hidden form">
            @include('pages.inc.addressForm')
          </div>
        </div>
      </div>
    </main>
@endsection