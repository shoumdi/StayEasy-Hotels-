@extends('layouts.gerant')
@section('main')
    <div class="con">
        <div class="imgs">
            @if ($room->images)
            <div style="background-image: url({{ asset('storage/'.$room->images) }});" class="show-img"></div>
            @else
            <div src="https://placehold.net/400x400.png" class="room-img"></div>
            @endif
        </div>
        <div class="containers">
            <div class="name_price">
                <div class="name_cat">
                    <p class="name_cat_price">{{ $room->name }}</p>
                    <p class="name_cat_categories">{{ $room->categories->name }}</p>
                </div>
                <p class="name_cat_price">${{ $room->price }}</p>
            </div>
            <div class="description">
                <h3 >discription</h3>
                <p>
                    A hotel room is a {{ $room->categories->name }}, comfortable space designed for guests to relax and stay overnight. It usually includes a bed, a bathroom, basic furniture, and essential amenities to ensure a pleasant and convenient stay.
                </p>
                <p>
                    The room is elegantly designed with modern décor and high-quality furnishings. It includes a spacious bed, a stylish private bathroom, premium toiletries, a flat-screen TV, high-speed Wi-Fi, and a beautiful view, providing a luxurious and relaxing experience.
                </p>
            </div>
            <div class="status">
                <h3>Status: </h3>
                @if ($room->status == 'available')
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-5 fs-4"><span class="status-dot bg-success"></span>{{ $room->status }}</span>
                @elseif($room->status == 'occupied')
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-5 fs-4"><span class="status-dot bg-success"></span>{{ $room->status }}</span>
                @elseif($room->status == 'maintenance')
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-5 fs-4"><span class="status-dot bg-success"></span>{{ $room->status }}</span>
                @endif
            </div>
            <div class="propreties" >
                <h3>Propreties: </h3>
                <div class="propreties_names">
                    @foreach ($room->propreties as $proprety)
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-5 fs-6">{{ $proprety->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="propreties" >
                <h3>Tags: </h3>
                <div class="propreties_names">
                    @foreach ($room->tag as $tag)
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-5 fs-8">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="creted">
                <p>Created_at:  <span>{{ $room->created_at }}</span></p>
                <p>Update_at:  <span>{{ $room->updated_at }}</span></p>
            </div>
            <div class="butt">
                <a href="{{ route('room.index') }}" class="btn btn-outline-dark"> <- Back</a>
            </div>
        </div>
    </div>
@endsection