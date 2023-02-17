@extends('layouts.master')
@section('content')
<style>


    .avatar {
    /* Rounded border */
    border-radius: 50%;
    height: 120px;
    width: 120px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }

    .avatar_image {
    /* Rounded border */
    border-radius: 50%;
    /* Take full size */
    height: 100%;
    width: 100%;
    }
    .row{
        background-color:  #ffffff;
        border-radius:15px;
        text-align:center;
        color:black;
        border: solid black 1px;
        box-shadow: 15px 10px black;
        width: min(35% - 2rem, 600px);
        margin-inline: auto;
        padding: 10px;
    }

    .background{
     margin: 0;
     padding: 0;
     height: 100vh;
     overflow: hidden;
     background: linear-gradient(to left, blue, lightblue);
    }

    input{
        width:50%;
    }
</style>
<body class="background">
<div class="row">
           <h3>Log In to MTICS Website<i class="fa fa-globe" aria-hidden="true"></i></h3>
        <div class="avatar">
            <img class="avatar_image" src="{{url('images/user.png')}}" alt="profile.jpeg">
        </div> 
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
            <form class="" action="{{route('login')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i>Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password"><i class="fa fa-key" aria-hidden="true"></i>Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                    <input type="submit" value="Sign In" class="btn btn-primary">  
             </form>
        </div>
</div>
</body>
@endsection