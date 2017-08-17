@component('mail::layout')

  {{-- Header --}}
  @slot('header')
      @component('mail::header', ['url' => config('app.url')])
          Tienda X
      @endcomponent
  @endslot

  #Your order has shipped

  ### Dear, {{ $user->name }}

  We are glad to notify you that your order has shipped
  with the following items:

<ul>
  @foreach ( $order->orderedProduct as $item )
  <li> {{ $item->name }} ({{ $item->pivot->qty }})</li>
  @endforeach
</ul>

  Total: $ {{ $order->total }}

  Thanks,<br>
  Tienda X


  {{-- Footer --}}
  @slot('footer')
      @component('mail::footer')
        &copy; Copyright - <a href="//manten-dev.me" target="_blank">Manten Developement 2017</a>
      @endcomponent
  @endslot
@endcomponent