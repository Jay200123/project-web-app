@extends('layouts.officer_master')
@section('content')
<style>
.row{
    text-align:center;
    position: absolute;
    border-radius:10px;
    border:solid black;
    width: 400px;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
    }

    .row input{
        padding: 5px;
        width: 95%;
        margin: 10px;
    }
</style>

    <div class="row">
                    <div class="card-header">{{ __('Change Password') }}</div>

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

                            <div class="form-group">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>
                        <br>
                        <div class="card-footer">
                            <button class="btn btn-success">Change Password</button>
                        </div>
                         <br>
                    </form>
    </div>
@endsection
