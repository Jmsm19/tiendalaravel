@extends('admin.layouts.dashboard')

@section('orders')
    <h4>Orders</h4>

    
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-inverse">
          <tr>
            <th>Order Id</th>
            <th>Client name</th>
            <th>Ordered Products</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($orders as $order)
          <tr>
            <td scope="row">{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>
              @foreach($order->orderedProduct as $product)
                {{ $product->name }}<br>
              @endforeach
            </td>
            <td>
              @foreach($order->orderedProduct as $product)
                {{ $product->pivot->qty }}<br>
              @endforeach
            </td>
            <td>$ {{ $order->total }}</td>
            <td>  
              {!! Form::open(array('route' => ['order.edit', 'id' => $order->id],'method' =>'put', 'class' => 'form')) !!}
                {!! Form::select('status', [0 => 'Pending', 1 => 'Delivered'], $order->delivered == 0 ? 0 : 1, ['class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
          @empty
          <td scope="row">No orders yet.</td>
          @endforelse
        </tbody>
      </table>
    </div>
@endsection