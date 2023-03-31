@extends('layouts.master')
  @section('title')
    Search Results
  @endsection
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<style>
  .center{
    text-align:center;
  }

  .text-class{
    list-style-type: none;
  }
</style>
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<div class="center">
<h1>Search Results</h1>
There are {{ $searchResults->count() }} results.
@foreach($searchResults->groupByType() as $type => $modelSearchResults)
   <h2>{{ $type }}</h2>
   
   @foreach($modelSearchResults as $searchResult)
       <ul>
            <li class="text-class"><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>      	
            </li>
       </ul>
   @endforeach
@endforeach
</div>
@endsection