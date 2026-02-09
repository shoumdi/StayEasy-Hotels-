@extends('layouts.gerant')

@section('main')

<div class="row align-items-end mb-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted small">Dashboard</a></li>
                <li class="breadcrumb-item active small" aria-current="page">Rooms</li>
            </ol>
        </nav>
        <h2 class="fw-bold mb-0 text-dark">Add Room</h2>
    </div>
</div>

<hr class="mb-4 text-muted opacity-25">

<div class="card-body">
    <form method="POST" action="{{ route('room.update' , $room->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Room Name</label>
            <input type="text" value="{{ $room->name }}" class="form-control" name="name" placeholder="Room 101">
        </div>
        <div class="mb-3">  
            <label class="form-label">Room Capacity</label>
            <input name="capacity" value="{{ $room->capacity }}" type="number" class="form-control" placeholder="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="images">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Room category</label>
            <select name="category_id" class="form-select">
                <option selected value="{{ $room->categories->id }}">{{ $room->categories->name }}</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <div class="col-md-3 ">
                @foreach ($tags as $tag)
                    <div class="form-check ">
                        <input class="form-check-input"type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="tags">{{ $tag->name }}</label>
                    </div>
                    @endforeach
            </div>
        </div>
        <div class="mb-3">
            <div class="col-md-3 ">
            <label for="tag" class="form-label">properties</label>
            @foreach ($propreties as $property)
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="propreties[]" value="{{ $property->id }}" id="category{{ $property->id }}">
                    <label class="form-check-label" for="tags">{{ $property->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="{{ $room->status }}">-- {{ $room->status }} --</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                    <option value="maintenance">Maintenance</option>
                </select>
        </div>
        <div class="mb-3">  
            <label class="form-label">Price per Night</label>
            <input name="price" value="{{ $room->price }}" type="number" class="form-control" placeholder="Enter Price Per Night">
        </div>
        
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save Room</button>
        </div>
        
    </form>
</div>
@endsection

