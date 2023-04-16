@extends('layouts.admin_base')
@section('title')
Total Page
@endsection
@section('content')
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<div class="container">
  <h4 style="text-align:center">Sum of all MTICS Transactions</h4>
  ===================================================================================================================================================================================================== 
  <h4>Sum of All Orders</h4>
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Total Sum for Finished Orders</h4>
          <p class="card-text">Total:(₱{{ $data['finished'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for Orders on Process</h4>
          <p class="card-text">Total:(₱{{ $data['process'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for ID Lace Orders</h4>
          <p class="card-text">Total:(₱{{ $data['lace'][0]->total }})</p>
        </div>
      </div>
    </div>

    

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for Orders for Small Tech Shirt</h4>
          <p class="card-text">Total:(₱{{ $data['small'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for Orders for Medium Tech Shirt</h4>
          <p class="card-text">Total: (₱{{ $data['medium'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for Orders for Large Tech Shirt</h4>
          <p class="card-text">Total:(₱{{ $data['large'][0]->total }})</p>
        </div>
      </div>
    </div>

</div>
</div>
===================================================================================================================================================================================================== 
<h4>Sum of All Printing Services</h4>
<div class="container">

    <div class="row">

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All of the Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['print'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All of the Colored Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['colored'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All of the Black and White Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['black'][0]->total }})</p>
        </div>
      </div>
    </div>

    </div>
</div>
===================================================================================================================================================================================================== 
<h4>Sum of All Printing Services by Size:</h4>
<div class="container">
<div class="row">

<div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All Small Size Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['sml'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All Medium Size Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['mdm'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All Large Size Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['lrg'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for All A4 Size Printing Service</h4>
          <p class="card-text">Total: (₱{{ $data['a4'][0]->total }})</p>
        </div>
      </div>
    </div>

</div>
</div>
=====================================================================================================================================================================================================    
<h4>Sum of All Membership Transactions:</h4>
<div class="container">
<div class="row">

<div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum for overall Membership Transactions</h4>
          <p class="card-text">Total: (₱{{ $data['member'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum Membership Transactions (Unpaid)</h4>
          <p class="card-text">Total: (₱{{ $data['unpaid'][0]->total }})</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sum Membership Transactions (Paid)</h4>
          <p class="card-text">Total: (₱{{ $data['paid'][0]->total }})</p>
        </div>
      </div>
    </div>

</div>
</div>

<h4>Sum of All Membership Transactions:</h4>
<div class="container">
<div class="row">

<div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Overall Total From All Transactions</h4>
          <p class="card-text">Total: (₱{{ $total }})</p>
        </div>
      </div>
    </div>

</div>
</div>
@endsection