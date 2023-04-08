@extends('layouts.admin_base')
@section('body')

@section('title')
   MTICS Dashboard 
@endsection 


<style>
.box{
    background: #FFFFFF;
    padding-right: 60px;
    padding-left: 280px;
    padding-left: 60;
  }

  .row{
    margin-top: 30px;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }

</style>

<div class="box">

<div class="container-fluid">

  <div class="row">
  <div class="card">
      <canvas id="memberChart"></canvas>
  </div>
  </div>

  <div class="row">
    <div class="card">
      <canvas id="serviceChart"></canvas>
    </div>
    </div>

    <div class="row">
    <div class="card">
      <canvas id="QtyChart"></canvas>
    </div>
    </div>


    <div class="row">
    <div class="card">
     Majority of Color Options for Printing Service
      <canvas id="colorChart"></canvas>
    </div>
    </div>


    <div class="row">
    <div class="card">
      <canvas id="userChart"></canvas>
    </div>
    </div>

    <div class="row">
    <div class="card">
      <canvas id="orderChart"></canvas>
    </div>
    </div>



</div>
</div>

@endsection