@extends('layouts.gerant')
        @section('main')
        
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="custom-card p-4">
                    <span class="text-muted small fw-bold">OCCUPANCY RATE</span>
                    <h2 class="fw-bold mb-0">84%</h2>
                    <div class="progress mt-3" style="height: 6px;">
                        <div class="progress-bar bg-primary" style="width: 84%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="custom-card p-4 text-center">
                    <a href="room/create" class="btn btn-primary w-100 py-3 rounded-4 shadow-sm fw-bold">
                        <i class="fa-solid fa-plus me-2"></i> Register New Room
                    </a>
                </div>
            </div>
        </div>

        <div class="custom-card">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center bg-white">
                <h5 class="mb-0 fw-bold">Current Inventory</h5>
                <button class="btn btn-outline-secondary btn-sm rounded-3"><i class="fa-solid fa-filter me-2"></i>Filters</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Room Info</th>
                            <th>status</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Daily Rate</th>
                            <th>Tag</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $rooms as $room)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    @if ($room->images)
                                        <img src="{{ asset('storage/'.$room->images) }}" class="room-img">
                                    @else
                                        <img src="https://placehold.net/400x400.png" class="room-img">
                                    @endif
                                    <div>
                                        <div class="fw-bold">{{ $room->name }}</div>
                                        <div class="text-muted small">{{ $room->property }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($room->status == 'available')
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2">
                                    <span class="status-dot bg-success"></span>{{ $room->status }}</span>
                                @elseif($room->status == 'occupied')
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2">
                                    <span class="status-dot bg-primary"></span>{{ $room->status }}</span>
                                @elseif($room->status == 'maintenance')
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">
                                    <span class="status-dot bg-danger"></span>{{ $room->status }}</span>
                                @endif
                            </td>
                                <td><span class="badge bg-light text-dark fw-medium">{{ $room->category }}</span></td>
                                <td><span class="badge bg-light text-dark fw-medium">{{ $room->Tag }}</span></td>
                                <td><span class="fw-bold text-primary">${{ $room->price }}</span></td>
                                <td><span class="fw-bold text-primary">{{ $room->capacity }}</span></td>
                            <td class="text-end pe-4">
                                <a href="{{ route('room.edit', $room->id) }}" class="btn btn-light btn-action text-warning border" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light btn-action text-danger border" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection