@extends('layouts.master')
@section('content')
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h3>Search Product</h3>
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Product Description</th>
        <th>Cost</th>
        <th>Product Image</th>
       </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{asset($product->product_image) }}" width = "70px" height="70px"></td>
        </tr>
    </tbody>
</table>
@endsection