@extends('layouts.master')
@section('title')

Student Profile
@endsection
@section('content')

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="icon" href="{{asset('images/MTICS.png')}}" type = "image/x-icon"> 
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">

<div class="container">
<br/>
@if ( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    <br/>
@endif
</div>
  
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
  </div>     
@endif

<div align="right">
<span class="image">
    <img src="/../images/MTICS1.png" width="500px">
</span>
</div>

<div class="wrapper">
    <div class="left" id="stud">
        <div class="stud">
        <img src="{{ asset($student->student_image) }}" alt="user">
        </div>
        <p>{{Auth::user()->role}}</p>
        <h3>{{$student->title}}. {{$student->fname}} {{$student->lname}}</h3>
        <BR>
         <p>Course & Section</p>
         <h4>{{$student->section}}</h4>
    </div>
    <div class="right">
        <div class="info">

            
            <h3>Student Info.</h3>
            
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <h4 style="color:black">{{Auth::user()->email}}</h4>
                 </div> 
                 <div class="data">
                    <h4>Phone</h4>
                    <h4 style="color:black">{{$student->phone}}</h4>                
                </div> 
            </div>

        </div>

        <div class="social_media">
          
            <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('member.forms')}}" type="button" class="btn btn-success">Access Membership</a>
            </div>
            </div>
          </ul>
          <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('students.edit', $student->student_id)}}" type="button" class="btn btn-primary">Update Record<Datag></Datag></a>
            </div>
            </div>
          </ul>
        </div>

        <div class="row">
        <div class="col-sm-6 col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">My Order List</button>
        </div>
        </div>

        <br>
      
      <div class="projects">
            <h3>INFORMATION</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Address</h4>
                    <h4 style="color:black">{{$student->address}}</h4>
                 </div>
                 <div class="data">
                    <h4>Town</h4>
                    <h4 style="color:black">{{$student->town}}</h4>
                 </div>
                 <div class="data">
                   <h4>City</h4>
                   <h4 style="color:black">{{$student->city}}</h4>
              </div>
            </div>
        </div>

      
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Order List</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    @if($orders->isEmpty())
        <h2>You Don't Have Any Orders yet!</h2>
    @else
        <h3 class="text-center">My Orders</h3> 
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($orders as $order)
                @foreach($order->products as $product)
                <div class="col-lg-4 col-sm-6 mb-4">
                   <div class="card">
                            <img src="{{ asset($product->product_image) }}" class="card-img-top" alt="{{ $product->name }}" height="120" width="120" alt="image.jpeg">
                            <div class="card-body">
                                <h3 class="card-text">{{ $product->description }}</h3>
                                <h5 class="card-subtitle mb-2 text-muted">Price {{ $product->price }}</h5>
                            </div>
                            <div class="card-footer text-end">
                                <h5 class="text-muted">Status:   {{ $order->status }}</h5>
                                <h5 class="text-muted">Date Placed:   {{ $order->date_placed }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


@endsection