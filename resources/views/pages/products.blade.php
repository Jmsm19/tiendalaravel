<h1 class="product-list-title">Lista de productos</h1>
<br>
<div class="container">
  <div class="row">

  @forelse ($products as $item)
    <div class="col col-sm-6 col-md-3">
      <div class="card" style="width: 15rem;">
        <div class="outer">
          <a href="{{ route('details', ['id' => $item->id]) }}">
          <img class="card-img-top text-center" src="/img/{{ $item->image }}" alt="{{ $item->name }}'s picture">
          </a>
          </img>
          <div class="addable"> 
            <a href="{{ route('cart.edit', $item->id) }}" class="text-center addable">
              Add to cart
            </a>
          </div>
        </div>
        <a class="card-block">
          <h5 class="card-title">{{ $item->name }}</h5>
          <h6 class="card-text text-right">$ {{ $item->price }}</h6>
        </a>
      </div>
    </div>
  @empty
    <p>No products available at the moment.</p>
  @endforelse
</div>
{{ $products->links() }}