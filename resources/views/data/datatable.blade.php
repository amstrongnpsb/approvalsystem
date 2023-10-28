@extends('layouts.main')
@push('datatable-css')
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('container')
<h1 class="text-center text-light">{{ $title }}</h1>
<div class="table-responsive">
    <table class="table" id="datatables">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Data Number</th>
                <th scope="col">Description</th>
                <th scope="col">Creator</th>
                <th scope="col">Status</th>
                <th scope="col">Submited Date</th>
                <th scope="col" width="100px">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        </tbody>
    </table>
</div>
@endsection
@push('datatable-scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
{{-- <script type="text/javascript">
  $(function () {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ajax: 'datatable',
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
        { data: 'created_at', 
        name: 'created_at',  
        render: function (data) {
          return moment(data).format('Y-M-D');
        }},
         {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
    });
  });
</script> --}}
<script>
  $(document).ready( function () {
    $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ajax: {url: '/datatable', type: 'GET'},
    columns: [
      {
          render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
          },
      },
      { data: 'data_number', name: 'data_number' },
      { data: 'description', name: 'description' },
      { data: 'creator', name: 'creator' },
      { data: 'status', name: 'status' },
      { data: 'created_at', name: 'created_at',render: function (data) {
          return moment(data).format('Y-M-D');
        }},
      {data: 'action', name: 'action', orderable: false, searchable: false},
     ]
    });
} );
</script>
@endpush