@extends('layouts.officer_master')
@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }

</style>
<div class="card push-top">
  <div class="card-header">
  <i class="fa fa-address-card" aria-hidden="true"></i> Membership Info
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
      <form method="POST" action="{{route('members.update', $member->info_id)}}" enctype ="multipart/form-data">

      @csrf 
              @method('PUT')
         <div class="form-group">
         <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ $member->users->email }}" readonly/>
          </div>

         <div class="form-group">
         <label for="date_placed">Date Placed</label>
              <input type="date" class="form-control" name="date_placed" value="{{ $member->date_placed }}" readonly/>
          </div>

          <div class="form-group">
         <label for="status">Status</label>
              <input type="date" class="form-control" name="status" value="{{ $member->status }}" readonly/>
          </div>

          <div class="form-group">
              <label for="date_paid">Date to be Paid</label>
              <input type="date" class="form-control" name="date_paid" value="{{ $member->stats->date_paid }}" readonly/>
          </div>

          <div class="form-group">
              <label for="amount">Amount</label>
              <input type="decimal" class="form-control" name="amount" value="{{ $member->stats->amount }}" readonly/>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection