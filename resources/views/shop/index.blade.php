@extends('layouts.master')
@section('content')

@section('title')
   MTICS Shop
@endsection 

<style>
  .row{
    border-radius: 5px;
    background: #FFFFFF;
    padding: 50px;
  }

  .h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
}

.text {
color: #606060;
}

</style>


<br>
<div align="right">
      <a href="{{ route('shop.shoppingCart') }}" class="btn btn-warning">
        <span class="badge">{{ Session::has('Cart') ? Session::get('Cart')->totalQty : '' }}</span> Shopping Cart
        </a>
      </p> 
</div>

<div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>
<div class="card">
<div id="viewport">
<div class="container ">
  <!-- Page Heading -->
  <hr>
  <div class="text">
  <h3>MTICS Merchandise</h3>
  </div>
  <br>

  <div class="row">
   @foreach ($products->chunk(3) as $productChunk)

            @foreach ($productChunk as $product)
                <div class="col-lg-4 col-sm-6 mb-4">
                   <div class="card">
                    <img src="{{ asset($product->product_image) }}" alt="..." class="img-responsive">
                      <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <h3 class="list-group-item" align="center">{{ $product->description }}</h3>
                        <h5 class="list-group-item">Price: ₱{{ $product->price}}</h5>
                      </ul>
                     </div>
                     <a href="{{ route('shops.addToCart', ['id'=>$product->product_id]) }}" class="btn btn-success"><i class=""></i> Add to Cart</a>
                  </div>
                </div>
            @endforeach
    @endforeach
</div>
{{ $products->links() }}
</div>
</div>
@endsection
