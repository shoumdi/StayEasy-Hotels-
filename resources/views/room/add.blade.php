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
    <form method="POST" action="{{ route('room.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Room Name</label>
            <input type="text" class="form-control" name="name" placeholder="Room 101">
        </div>
        <div class="mb-3">  
            <label class="form-label">Room Capacity</label>
            <input name="capacity" type="number" class="form-control" placeholder="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="images">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Room Type</label>
            <select name="category_id" class="form-select">
                <option  selected disabled>Choose type</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <select name="tag_id" class="form-select">
                <option  selected disabled>Choose Tag</option>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="proprety" class="form-label">proprety</label>
            <select name="proprety_id" class="form-select">
                <option  selected disabled>Choose proprety</option>
                @foreach ($propreties as $proprety)
                <option value="{{ $proprety->id }}">{{ $proprety->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <option value="">-- Select Status --</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                    <option value="maintenance">Maintenance</option>
                </select>
        </div>
        <div class="mb-3">  
            <label class="form-label">Price per Night</label>
            <input name="price" type="number" class="form-control" placeholder="100">
        </div>
        
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save Room</button>
        </div>
        
    </form>
</div>
@endsection

