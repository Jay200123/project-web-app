@extends('layouts.officer_base')
@section('body')
  <div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>


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