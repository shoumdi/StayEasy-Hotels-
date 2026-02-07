@extends('layouts.app')
@section('content')
<main class="p-3">
    <section>
        <h4>Profile</h4>
        <div class="card mb-3 p-2">
            <div class="row g-0 justify-content-start">
                <div class="col-md-1">
                    <img id="profilePicture" src="{{$user->image->url}}" class="card-img-top" alt="...">
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{$user->role->name}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">Contact</h5>
                        <p class="card-text">{{$user->email}}</p>
                    </div>
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-start gap-2">
                    @if($user->role->name === 'Client')
                        <a href="">Become a Manager</a>
                    @endif
                    <a href="{{route('profile.edit')}}" class="btn btn-primary">edit</a>
                    <a href="{{route('auth.logout')}}" class="btn btn-outline-danger">logout</a>
                </div>
            </div>

        </div>
    </section>


</main>
@endsection
