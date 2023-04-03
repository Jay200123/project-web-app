@extends('layouts.officer_base')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .background{
  background-color: lightblue;
  color: black;
}

.margin{
  margin-top:50px;
  margin-bottom:50px;
  margin-right:50px;
  margin-left:50px;
  background: white;
  width: 90%;
  border-radius:10px;
  color:black;
  padding: 15px;
}
</style>
<body class="background">
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
 
<h3 style="text-align:center">Product Records</h3>
<div class="margin">
<div class="col col-md-6">
    <a href="{{route('product.create')}}" class="btn btn-success btn-sm">Add New Product</a>
  </div>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td> Product ID</td>
          <td>Description</td>
          <td>Price</td>
          <td>Image</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
    @if(!empty($products) && $products->count())
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_id}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{ asset($product->product_image) }}" width = "70px" height="70px"></td>
            <td class="text-center">
            <a href="{{route('product.edit', $product->product_id)}}" class = "btn btn-primary btn-sm">Edit</a>
            <td>
            <form method="post" action="{{route('product.delete', $product->product_id)}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
            </td>
        </tr>
        @endforeach
        @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
    </tbody>
  </table>
  {!! $products->links() !!}
</div>
<div>
</body>
@endsection