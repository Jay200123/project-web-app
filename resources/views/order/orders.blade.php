@include('layouts.admin_base')
@section('body')
<div class="table-container">
{{$dataTable->table(['class' => 'table table-bordered table-striped table-hover '], true)}}
</div>

@push('scripts')
    {{$dataTable->scripts()}}
  @endpush
@endsection