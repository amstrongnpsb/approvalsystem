@extends('layouts.main')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('container')
<h1 class="text-center text-light">{{ $title }}</h1>
@include('data.exportimport.index')
<table class="table mt-5 w-75 m-auto">
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
        @foreach($data as $d)
        <tr>
            <th scope="row">{{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</th>
            <td class="text-capitalize">{{ $d->data_number }}</td>
            <td class="text-capitalize">{{ Str::of($d->description)->limit(100)}}</td>
            <td class="text-capitalize">{{ $d->creator }}</td>
            <td class="text-capitalize">{{ $d->status }}</td>
            <td class="text-capitalize">{{ $d->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex mt-4 justify-content-center" style="margin-right: 200px">
    {{ $data->withQueryString()->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
     function initializeSelect2(selector, placeholder, columnName,url,minimumInput) {
        $(document).ready(function() {
            $(selector).select2({
                placeholder: placeholder,
                minimumInputLength: minimumInput,
                ajax:{
                    url: url,
                    dataType: 'json',
                    type: 'get',
                    delay: 250,
                    data: function(params) {
                        return {
                            column_name: columnName,
                            filter: params.term,
                        };
                    },
                    processResults: function (data) {
                        
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item[columnName],
                                    text: item[columnName]
                                }
                            })
                        };
                    },
                } 
            });
        });
    }
    initializeSelect2('.statusFilter', 'Select Status', 'status',"{{ route('filter.onDataTable') }}",0);
    initializeSelect2('.dataNumberFilter', 'Select Data Number', 'data_number',"{{ route('filter.onDataTable') }}",0);
    initializeSelect2('.creatorFilter', 'Select Creator', 'creator',"{{ route('filter.onDataTable') }}",0);
</script>
@endsection