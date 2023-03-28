@extends('layouts.officer_master')
@section('content')
<style>
  .push-top {
    margin-top: 50px;

    
  }

  .margin{
  margin-top: 75px;
  margin-left: 75px;
  margin-right: 75px;
  border-radius: 5px;
  width: 90%;
  background: #FFFFFF;
  padding: 15px;
}

</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
 
  <div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h3 style="text-align:center">MTICS Service Transactions</h3> 
<div class="margin">
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Section</td>
          <td>Email</td>
          <td>File Name</td>
          <td>Size</td>
          <td>Color Option</td>
          <td>Cost</td>
          <td>Quantity</td>
          <td>Date Placed</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
    @if(!empty($service) && $service->count())
        @foreach($service as $services)
        <tr>
            <td>{{$services->service_id}}</td>
            <td>{{$services->fname}}</td>
            <td>{{$services->lname}}</td>
            <td>{{$services->section}}</td>
            <td>{{$services->email}}</td>
            <td>{{$services->filename}}</td>
            <td>{{$services->size}}</td>
            <td>{{$services->options}}</td>
            <td>{{$services->cost}}</td>
            <td>{{$services->quantity}}</td>
            <td>{{$services->date_placed}}</td>
            <td class="text-center">
            <a href="{{route('service.edit', $services->service_id)}}" class = "btn btn-primary btn-sm">Update</a>
            <form method="post" action="{{route('service.delete', $services->service_id)}}">
              @csrf
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        
        @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
    </tbody>
  </table>
</div>
  {!! $service->links() !!}
  </div>
@endsection
