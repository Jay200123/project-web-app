@extends('layouts.master')
@section('title')
Password Settings
@endsection
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">


<style>
.wrapper{
    text-align:center;
    position: absolute;
    width: 400px;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }

  .wrapper .title{
  border-radius: 15px 15px 15px 15px;
  }


    h4{
    color: grey;
}

</style>

<div class="wrapper">
                    <h3 class="title">{{ __('Change Password') }}</h3>
                    <h4>Settings</h4>
                    <br>

                    <form action="{{route('updatePassword')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="field">
                                <label for="oldPasswordInput" class="form-label"></label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="newPasswordInput" class="form-label"></label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="confirmNewPasswordInput" class="form-label"></label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>
                        <br>
                        <br>

                        <div class="card-footer">
                            <button class="btn btn-success">Change Password</button>
                        </div>
                    </form>
    </div>
@endsection
