@extends('layouts.master')
@section('content')

@section('title')
   MTICS Cart
@endsection 

<style>

  .rows{
    border-radius: 5px;
    background: #FFFFFF;
    padding: 50px;
  }

  .h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
}
</style>

@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif


<br>
<div class="rows">
<div class="row" align="right">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <a href="{{ route('shop.index') }}" type="button" class="btn btn-danger">Back</a>
</div>
</div>

    @if(Session::has('Cart'))

    <br>
    <br>
    
 
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                        <strong>{{ $product['product']['description'] }}</strong>
                    <span class="label label-success">{{ $product['product']['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('shop.remove',['id'=>$product['product']['product_id']]) }}">Delete</a></li>

                                    </ul>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total:$ {{ $totalPrice }}.00</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
            
        </div>
    


    @else
        <div class="row" align="center">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h3>No Items Available</h3>
            </div>
        </div>
    @endif

    </div>

    

@endsection