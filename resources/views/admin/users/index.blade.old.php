@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar vh-100 p-3 text-white">
            <h4 class="mb-4">AdminPanel</h4>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white active bg-primary rounded">Users</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">Settings</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">Reports</a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <strong>Admin User</strong>
                </a>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">User Management</h1>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    + Add New User
                </button>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="ps-4"><strong>{{$user->name}}</strong></td>
                                    <td>{{$user->email}}</td>
                                    <td><span class="badge bg-info text-dark">{{$user->role->name}}</span></td>
                                    <td><span :class="badge bg-success">{{$user->status}}</span></td>
                                    <td class="d-flex pe-4">
                                        @if($user->role->name!== 'Admin')
                                        @if($user->status === 'pending')
                                        <form action="{{route('admin.users.update')}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-check"></i></button>
                                            <input type="hidden" name='id' value="{{$user->id}}">
                                        </form>
                                        @endif
                                        <form action="{{route('admin.users.edit')}}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-warning me-1"><i class="far fa-edit"></i></button>
                                            <input type="hidden" name='id' value="{{$user->id}}">
                                        </form>
                                        <form method="post" action="{{route('admin.users.delete')}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                            <input type="hidden" name='id' value="{{$user->id}}">
                                        </form>
                                        @else
                                        <span>Owner</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0 justify-content-center">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection