@extends('layouts.officer_base')
@section('title')
Printing Service Records
@endsection
@section('body')
<style>
  .table-container{
    margin-right: 50px;
    margin-left:50px;
    margin-top:50px;
    margin-bottom:50px;
  }

</style>
  <div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>

  <div class="table-container">
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>

@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection