@extends('layouts.main')
@section('container')
<h1 class="text-center text-light">{{ $title }}</h1>
@include('data/exportimport/index')
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
            <td class="text-capitalize">{{ $d->description }}</td>
            <td class="text-capitalize">{{ $d->creator }}</td>
            <td class="text-capitalize">{{ $d->status }}</td>
            <td class="text-capitalize">{{ $d->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex mt-4">
    {{ $data->links() }}
</div>

@endsection