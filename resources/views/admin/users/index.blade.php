@extends('layouts.dashboard')
@section('main')

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{asset($user->image->url)}}" class="room-img rounded-circle">
                            <div>
                                <div class="fw-bold">{{$user->name}}</div>
                                <!-- <div class="text-muted small">Floor 1 • Ocean View</div> -->
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark fw-medium">{{$user->role->name}}</span></td>

                    <td>
                        @switch( $user->status)
                        @case('pending')
                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2">
                            <span class="status-dot bg-warning"></span>Pending</span>
                        @break
                        @case('denied')
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">
                            <span class="status-dot bg-danger"></span>Denied</span>
                        @break
                        @case('banned')
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">
                            <span class="status-dot bg-danger"></span>Banned</span>
                        @break
                        @case('active')
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2">

                            <span class="status-dot bg-success"></span>Active</span>
                        @break
                        @endswitch
                    </td>

                    <td class="text-end">
                        <div class="d-flex gap-2 align-items-center justify-content-end">
                            @if($user->status==='pending')
                            <form action="{{route('admin.users.update.status')}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="denied">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button class="btn btn-light btn-action text-danger border" type="submit">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            </form>
                            <form action="{{route('admin.users.update.status')}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="active">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button class="btn btn-light btn-action text-success border" type="submit">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>
                            @endif
                            <a href="" class="btn btn-light btn-action text-warning border">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{route('admin.users.update.status')}}" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="status" value="banned">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-light btn-action text-danger border">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach

        </table>
    </div>

    @endsection