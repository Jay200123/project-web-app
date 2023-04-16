@extends('layouts.officer_master')
@section('content')

<style>

  .profile{
    border-radius: 50%;
    border: solid 1px;
  }
  </style>


<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
    <h1>Update Service Record</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<br>
 <div class="container">
    <div class="title">Update Service</div>
    <div class="content">
    <br>
      <form method="post" action="{{ route('product.update', $product->product_id) }}" enctype ="multipart/form-data">
        @csrf
        @METHOD('PUT')
          <div class="form-group">
              @csrf
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{$product->description}}"/>
           </div>
    
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" value="{{$product->price}}"/>
          </div>
          <div class="form-group">
           <label for="image" class="control-label">Product Image</label>
           @if ($product->product_image)
           <div class="image-box">
            <img class="profile" src="{{ asset($product->product_image) }}" height="250" width="350" alt="event.jpeg">
            </div>
          @else
           <p>No image uploaded</p>
        @endif
        </div>

          <div class="form-group">
          <label for="imagePath" class="control-label">Update Image</label>
          <input type="file" class="form-control"  name="product_image" value="{{asset($product->product_image)}}" multiple>

          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
  </div>
          <button type="submit" class="btn btn-block btn-success">Update Product Record</button>
      </form>
  </div>

</div>

  </div>
  </body>
@endsection