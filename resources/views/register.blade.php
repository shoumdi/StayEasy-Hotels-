@extends('layouts.app')
@section('content')
<main class="w-full h-screen grid place-items-center overflow-hidden">

    <div class="w-100 d-flex justify-content-center align-items-center">
        <form class="w-25" action="{{route('auth.register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="">
                <label>Account type</label>
                <div class="d-flex justify-content-between">
                    @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_id" id="{{$role->name}}" value="{{$role->id}}">
                        <label class="form-check-label" for="{{$role->name}}">
                            {{$role->name}}
                        </label>
                    </div>
                    @endforeach
                </div>

            </div>
            <input type="submit" value="Login" class="w-100 btn btn-primary">
        </form>
    </div>
</main>
@endsection