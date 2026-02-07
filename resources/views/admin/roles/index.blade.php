@extends('layouts.dashboard')
@section('main')

<div class="card-body">
    <div class="d-flex justify-content-end">
        <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Add Role</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Id</th>
                    <th>Name</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role )
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <div class="fw-bold">{{$role->id}}</div>
                                <!-- <div class="text-muted small">Floor 1 • Ocean View</div> -->
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark fw-medium">{{$role->name}}</span></td>

                    <td class="text-end">
                        <div class="d-flex gap-2 align-items-center justify-content-end">
                            <a href="" class="btn btn-light btn-action text-warning border" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{route('admin.roles.delete')}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <button type="submit" class="btn btn-light btn-action text-danger border" title="Delete">
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