@extends('layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/show.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<style>
    .margin{
        margin-top:50px;
        border:solid black 2px;
    }
</style>
<div class="margin">
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="img-container">
					<img src="{{asset($event->event_image)}}" alt="image.jpeg">
				</div>
				<div class="desc">
					<h2>{{$event->title}}</h2>
                    <h4>Date Announce: {{$event->date_placed}}</h4>
                    <h4>Will take place at {{$event->date_occured}}</h4>
					</div>
			</div>
		</div>
	</div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection