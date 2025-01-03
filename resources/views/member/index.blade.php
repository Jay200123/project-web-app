@extends('layouts.officer_master')
@section('title')
Membership Transactions
@endsection
@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }

</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="push-top">
<div class="card-body">
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
  </div>     
<br>
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h3 style="text-align:center">MTICS Membership Transactions</h3> 
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Membership ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Section</td>
          <td>Date Placed</td>
          <td>Date to be Paid</td>
          <td>Status</td>
          <td>Amount</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
    @if(!empty($members) && $members->count())
        @foreach($members as $member)
        <tr>
            <td>{{$member->info_id}}</td>
            <td>{{$member->student->fname}}</td>
            <td>{{$member->student->lname}}</td>
            <td>{{$member->student->section}}</td>
            <td>{{$member->date_placed}}</td>
            <td>{{$member->stats->date_paid}}</td>
            <td>{{$member->status}}</td>
            <td>{{$member->stats->amount}}</td>
            <td class="text-center">
            <a href="{{route('members.edit', $member->info_id)}}" class = "btn btn-primary btn-sm">Update</a>
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
  {!! $members->links() !!}
  </div>
  <footer>@2023 Manila Technician Institute Computer Society TUP Taguig All rights reserved.</footer>
@endsection