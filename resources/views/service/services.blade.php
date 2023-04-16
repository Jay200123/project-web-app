@extends('layouts.officer_base')
@section('title')
Printing Service Records
@endsection
@section('body')
<style>
  <style> 
.container{
    background: #FFFFFF;
    padding-right: 60px;
    padding-left: 280px;
    padding-left: 60;
  }

  .row{
    margin-top: 30px;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }
  .title1{
    color: grey;
  }
</style>

<div class="container">
  <h3 class="title1">SERVICE RECORDS</h3>
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif

<div class="row">
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>
</div>
@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection