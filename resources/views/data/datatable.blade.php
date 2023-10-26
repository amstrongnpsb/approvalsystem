@extends('layouts.main')
@section('container')
<h1 class="text-center text-light">{{ $title }}</h1>
@include('data/exportimport/index')
<div class="table-responsive">
    <table class="table mt-5 w-75 m-auto" id="datatables">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Data Number</th>
                <th scope="col">Description</th>
                <th scope="col">Creator</th>
                <th scope="col">Status</th>
                <th scope="col">Submited Date</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
           
        </tbody>
    </table>
</div>
@endsection
@push('datatable-scripts')
<script type="text/javascript">
  $(function () {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ajax: 'data/json',
      columns: [
        {
           render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
           },
        },
        { data: 'data_number', name: 'data_number'},
        { data: 'description', name: 'description'},
        { data: 'creator', name: 'creator'},
        { data: 'status', name: 'status'},
        {   data: 'created_at', 
            name: 'created_at',  
            render: function (data) {
                    return moment(data).format('Y-M-D');
                    }},
      ],
    });
  });
</script>
@endpush