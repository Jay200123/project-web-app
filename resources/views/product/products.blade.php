@extends('layouts.officer_base')
@section('title')
Product Records
@endsection
@section('body')
  <div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>

  <div class="col-xs-6">
  <form method="post" enctype="multipart/form-data" action="{{ route('product.import') }}">
     @csrf
     <input type="file" id="uploadName" name="product_import" required>
 </div>

 @error('product_import')
     <small>{{ $message }}</small>
   @enderror
        <button type="submit" class="btn btn-info btn-primary " >Import Excel File</button>
        </form> 
 </div>
<br>
  <div class="col col-md-6">
    <a href="{{route('product.create')}}" class="btn btn-success btn-sm">Add New Product</a>
  </div>

<div>
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>
@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection