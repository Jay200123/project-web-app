@extends('layouts.officer_master')
@section('title')
Update Transactions
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

<br>
 <div class="container">
    <div class="title">Order Details</div>
    <div class="content">

    <form method="post" action="{{route('order.update', $orders->id)}}">
     @csrf
     @method('PUT')
        <div class="user-details">

          <div class="input-box">
          <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" value="{{ $orders->student->fname }}" readonly/>
          </div>

          <div class="input-box">
          <label for="lname">Last Name</label>
             <input type="text" class="form-control" name="lname" value="{{ $orders->student->lname }}" readonly/>
          </div>

          <div class="input-box">
          <label for="section">Section</label>
            <input type="text" class="form-control" name="section" value="{{ $orders->student->section }}" readonly/>
          </div>

          <div class="input-box">
          <label for="date_placed">Date Placed</label>
              <input type="text" class="form-control" name="date_placed" value="{{$orders->date_placed}}" readonly/>
          </div>

          <div class="input-box">
           <label for="status">Status</label>
              <input type="text" class="form-control" name="status" value="{{ $orders->status }}" readonly/>
          </div>

          <div class="user-details">
          @foreach($orders->products as $product)
          <div class="input-box">
            <label for="product">Orders</label>
              <input type="text" class="form-control" name="amount" value="{{$product->description}}" readonly/>
          </div>
          @endforeach

         </div>
  
          </div>

        <div class="button">
          <input type="submit" value=" Update Transaction">
        </div>

      </form>
    </div>
  </div>
@endsection