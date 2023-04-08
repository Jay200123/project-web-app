@extends('layouts.officer_master')
@section('content')
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>

<h5>({{$student->title}}. {{$student->fname,}} {{$student->lname}} Transaction History)</h5>
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
            <td>₱{{$members->stats->amount}}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
</div>
<br>
<h3>Shop Transaction History</h3>
<div class="margin">
<table class="table">
    <thead>
    <tr class="table-warning">
        <th>Order ID</th>
        <th>Date Placed</th>
        <th>Status</th>
        <th>Orders</th>
       </tr>
    </thead>

    @if($student->orders->count() === 0)
        <h2>Student Has No Orders!</h2>
    @else
    <tbody>
    @foreach($student->orders as $orders)
        <tr>
            <td>{{$orders->id}}</td>
            <td>{{$orders->date_placed}}</td>
            <td>{{$orders->status}}</td>
            <td>
                @foreach($orders->products as $product)
                <ul>
                    <li>{{$product->description}}</li>
                    <li>Price:₱{{$product->price}}</li>
                </ul>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>

</div>
@endsection

