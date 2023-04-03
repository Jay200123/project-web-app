@extends('layouts.master')
@section('content')

@section('title')
   MTICS Events
@endsection 

<style>

.container {
    padding-top: 30px;
    

}

.row {
    padding-top: 50px;
    border-radius: 25px;

  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);

}

.carousel-caption{
    top: 590px;
}

.slider-image {
  text-align: center;
}

.slider-image img {
  max-width: 100%;
  height: 750px;
}



.text {
    color: #606060;
}
</style>




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<div class="container">
<div class="text">
  
<h2>MTICS EVENTS</h2>
</div>
<br>
        <div class="row">    
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($events as $events)
                                <div class="carousel-item @if($loop->first) active @endif">

                                    <div class="slider-image"  align="center">
                                    <img src="{{ asset($events->event_image) }}" alt="{{ $events->event_image }}" >
                                    </div>
<!-- 
                                    <div class="carousel-caption" style="text-align: left; color:black;">
                                    <h1>{{ $events->title }}</h1>
                                    <h4>will occured at: {{ $events->date_occured }}</h4>
                                    </div> -->

                                </div>
                            @endforeach
                     
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>

                        </button>

                    </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <!----About gallery carousel end---->

@endsection
