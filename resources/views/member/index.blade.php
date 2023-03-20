@extends('layouts.officer_master')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

</style>
<div class="push-top">
<div class="card-body">
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
  </div>     


<h3>MTICS Membership Records</h3> 
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Section</td>
          <td>Date Placed</td>
          <td>Status</td>
          <td>Date to be Paid</td>
          <td>Amount</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{$member->info_id}}</td>
            <td>{{$member->student->fname}}</td>
            <td>{{$member->student->lname}}</td>
            <td>{{$member->student->section}}</td>
            <td>{{$member->date_placed}}</td>
            <td>{{$member->status}}</td>
            <td>{{$member->stats->date_paid}}</td>
            <td>{{$member->stats->amount}}</td>
            <td class="text-center">
            <a href="{{route('members.edit', $member->info_id)}}" class = "btn btn-primary btn-sm">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
@endsection