@extends('layouts.officer_master')
@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>


<div class="card push-top">
  <div class="card-header">
    Edit Product Record
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    
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
          <label for="imagePath" class="control-label">Product Image</label>
          <input type="file" class="form-control"  name="product_image" value="{{asset($product->product_image)}}" multiple>

          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
  </div>
          <button type="submit" class="btn btn-block btn-danger">Update Product Record</button>
      </form>
  </div>

</div>
@endsection