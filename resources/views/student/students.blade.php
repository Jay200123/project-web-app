@extends('layouts.admin_base')
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
  <form method="post" enctype="multipart/form-data" action="{{ route('student.imports') }}">
     @csrf
     <input type="file" id="uploadName" name="student_import" required>
 </div>
 
   @error('customer_import')
     <small>{{ $message }}</small>
   @enderror
        <button type="submit" class="btn btn-info btn-primary " >Import Excel File</button>
        </form> 
 </div>

<div>
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>

@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection