@extends('layouts.master')
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