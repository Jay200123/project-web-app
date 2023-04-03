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

<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<body class="background">
  <div class="margin">
<div class="card push-top">
  <div class="card-header">
    Add New Record Products
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
    
      <form method="post" action="{{ route('product.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" id="description"/>
           </div>
    
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" id="price"/>
          </div>

          <div class="form-group">
          <label for="imagePath" class="control-label">Product Image</label>
          <input type="file" class="form-control" id="product_image" name="product_image" multiple>

          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
  </div>
          <button type="submit" class="btn btn-block btn-success">Add New Item</button>
      </form>
  </div>

</div>
  </div>
</body>
@endsection