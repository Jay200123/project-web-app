@extends('layouts.officer_base')
@section('body')

@section('title')
   MTICS Events Setting
@endsection 
<style>
  .vertical-center {
  text-align:center;
}
</style>
<br>
<div class="vertical-center">
  <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#serviceModal"><strong> Add New Event</strong></a>
</div>

<br>

<div>
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover'], true)}}
</div>

<div class="modal " id="serviceModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:40%;">
      <div class="modal-content">
        <div class="modal-header text-center">
          
          <p class="modal-title w-100 font-weight-bold">Add New Event</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form  method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">

        {{csrf_field()}}
          
        <div class="modal-body mx-3" id="inputfacultyModal">

          <div class="md-form mb-5">
            <i class=""></i>
            <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
          width: 150px; ">Event Title </label>
            <input type="text" id="title" class="form-control validate" name="title">
          </div>

          <div class="md-form mb-5">
            <i class=""></i>
            <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
          width: 150px; ">Date Occurence</label>
            <input type="date" id="date_occured" class="form-control validate" name="date_occured">
          </div>

          <div class="md-form mb-5">
            <i class=""></i>
            <label data-error="wrong" data-success="right" for="name" style="display: inline-block;
          width: 150px; ">Event Image</label>
            <input type="file" id="event_image" class="form-control validate" name="event_image" placeholder="Image file" multiple>
          </div>


         <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
          </div>
         </form>
</div>
</div>
</div> 

@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
  
@endsection