@extends('layouts.officer_base')
@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>


<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
 
  <div class="col col-md-6">
    <a href="{{route('product.create')}}" class="btn btn-success btn-sm">Add New Item</a>
  </div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Description</td>
          <td>Price</td>
          <td>Image</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_id}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{ asset($product->product_image) }}" width = "70px" height="70px"></td>
            <td class="text-center">
            <a href="{{route('product.edit', $product->product_id)}}" class = "btn btn-primary btn-sm">Edit</a>
             <form method="post" action="{{route('product.delete', $product->product_id)}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection