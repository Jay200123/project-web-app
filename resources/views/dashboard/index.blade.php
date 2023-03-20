@extends('layouts.admin_base')
@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 f">
      <canvas id="memberChart"></canvas>
    </div>
    <div class="col-md-4 g">
      <canvas id="serviceChart"></canvas>
    </div>
    <div class="col-md-4 h">
      <canvas id="QtyChart"></canvas>
    </div>

    <div class="col-md-4 h">
     Majority of Color Options for Printing Service
      <canvas id="colorChart"></canvas>
    </div>

    <div class="col-md-4 h">
      <canvas id="userChart"></canvas>
    </div>
  </div>
</div>
@endsection