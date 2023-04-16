@extends('layouts.admin_base')
@section('title')
User Records
@endsection
@section('body')

<style>

.container{
    background: #FFFFFF;
    padding-right: 60px;
    padding-left: 280px;
    padding-left: 60;
  }

  .row1{
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
  <h3 class="title1">USERS LIST</h3>
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif

  <div class="col-xs-6">
  <form method="post" enctype="multipart/form-data" action="{{ route('student.imports') }}">
     @csrf
     <input type="file" id="uploadName" name="student_import" required>
     <br />
   @error('customer_import')
     <small>{{ $message }}</small>
   @enderror
        <button type="submit" class="btn btn-info btn-primary " >Import Excel File</button>
  </form> 
  </div>


<div class="row1">
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>
</div>

@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection