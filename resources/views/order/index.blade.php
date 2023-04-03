@extends('layouts.officer_master')
@section('title')
Shop Transactions
@endsection
@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }

    .content{
    margin-top: 75px;
  margin-left: 75px;
  margin-right: 75px;
  border-radius: 5px;
  width: 90%;
  background: #FFFFFF;
  padding: 10px;   
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
<br>
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h3 style="text-align:center">MTICS Shop Transactions</h3> 
<div class="content">
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Order ID</td>
          <td>Student Name</td>
          <td>Last Name</td>
          <td>Section</td>
          <td>Date Placed</td>
          <td>Status</td>
          <td>Orders</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
    @if(!empty($orders) && $orders->count())
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->student->fname}}</td>
            <td>{{$order->student->lname}}</td>
            <td>{{$order->student->section}}</td>
            <td>{{$order->date_placed}}</td>
            <td>{{$order->status}}</td>
            <td>
            <ul>
            @foreach($order->products as $product)
                <li>{{$product->description}}</li>
            @endforeach
            </ul>
        </td>
            <td class="text-center">
            <a href="{{route('order.edit', $order->id)}}" class = "btn btn-primary btn-sm">Update</a>
            </td>
            <td>
            <form method="post" action="{{route('order.delete', $order->id)}}">
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
  {!! $orders->links() !!}
  </div>
  <footer style="text-align:center">@2023 Manila Technician Institute Computer Society TUP Taguig All rights reserved.</footer>
@endsection