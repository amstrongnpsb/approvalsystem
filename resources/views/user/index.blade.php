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
                @if($user->roles[0]->name != "Super-Admin")
                <button class="btn btn-info edit-user" data-userId="{{ $user->id }}">Edit</button>
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
    {{-- user-edit --}}
    <div class="modal fade" id="edit-user-modal" aria-hidden="true" aria-labelledby="edit-user-modal-label"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-user-modal-label">Edit User Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" value="" id="edit-user-id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit-username" name="username"
                                placeholder="username" value="" autofocus required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit-name" name="name" placeholder="name"
                                value="" required">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="edit-nik" name="nik" placeholder="nik" value=""
                                required>
                            <label for="nik">NIK</label>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="edit-role" value="">
                                @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-dark mb-4 " id="update">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    $(".edit-user").click(function () {
        const userId = $(this).attr("data-userId");
        $("#edit-user-modal").modal("show");
        $.ajax({
            url: `user/${userId}/edit`,
            method: "GET",
            success: function (response) {
                if (response.status == 404) {
                    console.log(`error ${response.message}`);
                } else {
                    $("#edit-user-id").val(response.user.id);
                    $("#edit-username").val(response.user.username);
                    $("#edit-name").val(response.user.name);
                    $("#edit-nik").val(response.user.nik);
                    $("#edit-role").val(response.user.roles[0].name);
                }
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    });

    $("#update").click(function (e) {
        e.preventDefault();
        const userId = $('#edit-user-id').val();
        const user = {
            id: userId,
            username: $("#edit-username").val(),
            name: $("#edit-name").val(),
            nik: $("#edit-nik").val(),
            role: $("#edit-role").val(),
        }
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `user/${userId}`,
            method: "PUT",
            data: user,
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
                console.log("Status: " + status);
            }
        });
    });
</script>
@endsection