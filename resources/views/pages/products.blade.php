<h1 class="product-list-title">Lista de productos</h1>
<br>
<div class="container">
  <div class="row">
    @foreach($products as $item)
    <div class="col">
      <div class="card" style="width: 20rem;">
        <div class="outer">
          <img class="card-img-top" src="{{ $item->image }}" alt="{{ $item->name }}'s picture'">
          <div class="addable">
            <a href="#" class="text-center addable">Add to cart</a>
          </div>
          </img>
        </div>
        <a class="card-block">
          <h4 class="card-title">{{ $item->name }}</h4>
          <p class="card-text">{{ $item->description }}</p>
        </a>
      </div>
    </div>
    @endforeach    
  </div>
</div>