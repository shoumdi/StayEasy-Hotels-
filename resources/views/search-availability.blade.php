@extends('layouts.app')
@section('content')
<main class="vw-100 vh-100 p-3 bg-danger">
    <div class="p-4 bg-light rounded-3">
        <form class="d-flex justify-content-between" method="get" action="{{route('availablility.search')}}">
            @csrf    
        <div class="d-flex flex-column gap-2">
                <div class="d-flex flex-column">
                    <label for="in_date">Check-in Date</label>
                    <input type="date" name='in_data'>
                </div>
                <div class="d-flex flex-column">
                    <label for="out_date">Check-out Date</label>
                    <input type="date" name='out_data'>
                </div>
            </div>
            <button type="submit" class="p-5 rounded-3 btn btn-warning"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

</main>
@endsection