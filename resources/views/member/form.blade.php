@extends('layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/member.form.css')}}">
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="300px">
</div>

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
      
    @endif

 
    <h4 align="center">Membership fee</h4>
    <form method="POST" action="{{route('member.register')}}">
    @csrf
        <div class="field">
        <input type="decimal" class="form-control" name="amount" id="amount" value="120.00" readonly/>       
        </div>

        <div class="content">
          <div class="checkbox">
        </div>

        <div></div>
        </div>

        <div class="field">
        <input type="submit" class="btn btn-block btn-danger"></input>
        </div>
      </form>
    </div>

</div>
@endsection