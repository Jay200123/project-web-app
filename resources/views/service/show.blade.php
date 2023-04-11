@extends('layouts.officer_master')
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h3>Membership Transaction History</h3>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<div class="margin">
<table class="table">
    <thead>
    <tr class="table-warning">
        <th>Title</th>
        <th>Student Name</th>
        <th>Last Name</th>
        <th>Section</th>
        <th>Membership Status</th>
        <th>Date Placed</th>
        <th>Date Paid</th>
        <th>Amount</th>
       </tr>
    </thead>

    @if($student->members->count() === 0)
        <h2>Student Has No Membership Records!</h2>
    @else
    <tbody>
    @foreach($student->members as $members)
        <tr>
           <td>{{$members->student->title}}</td>
            <td>{{$members->student->fname}}</td>
            <td>{{$members->student->lname}}</td>
            <td>{{$members->student->section}}</td>
            <td>{{$members->status}}</td>
            <td>{{$members->date_placed}}</td>
            <td>{{$members->stats->date_paid}}</td>
            <td>{{$members->stats->amount}}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
</div>