@extends('layouts.dashboard')
@section('main')

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Hotel name</th>
                    <th>address</th>

                    <th>Status</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel )
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $user->image->url }}" class="room-img">
                            <div>
                                <div class="fw-bold">{{$hotel->name}}</div>
                                <!-- <div class="text-muted small">Floor 1 • Ocean View</div> -->
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark fw-medium">{{ $hotel->address }}</span></td>
                    <!-- <td><span class="fw-bold text-primary">{{$hotel->status}}</span></td> -->
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
                        @case('active')
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2">

                            <span class="status-dot bg-success"></span>Active</span>
                        @break
                        @endswitch
                    </td>

                    <td class="text-end pe-4 d-flex">
                        <div class="d-flex gap-2 align-items-center flex-end">

                            <a href="{{ route('hotel.edit',$hotel) }}" class="btn btn-light btn-action text-warning border" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('hotel.destroy', $hotel) }}" method="POST">
                                @csrf
                                @method('delete')
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