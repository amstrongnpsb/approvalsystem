@extends('layouts.main')
@section('container')
<h1 class="text-center text-light">{{ $title }}</h1>
<table class="table mt-5 w-75 m-auto">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Nik</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($users as $user)
        <tr>
            <th scope="row">{{($users->currentPage() - 1) * $users->perPage() + $loop->iteration}}</th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->nik }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles[0]->name }}</td>
            <td>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-info">Edit</a>
                @if($user->roles[0]->name != "Super-Admin")
                <button class="btn btn-dark permissions" data-roleId="{{ $user->roles[0]->id }}">Permissions</button>
                <div class="modal fade" id="permissions-modal" aria-hidden="true"
                    aria-labelledby="permissions-modal-label" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="permissions-modal-label">User Permissions List</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex mt-4">
    {{ $users->links() }}
</div>
@endsection
@section('js')
<script>
    $(".permissions").click(function () {
        const roleId = $(this).attr("data-roleId");
        $.ajax({
            url: `api/permissions/${roleId}`,
            method: "GET",
            success: function (data) {
                // Insert the data into the modal
                const mapping = data.map(function (item) {
                    return `<li class="text-capitalize">${item.name}</li>`
                })
                $("#permissions-modal .modal-body").html(mapping);
                $("#permissions-modal").modal("show");
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    })
</script>
@endsection