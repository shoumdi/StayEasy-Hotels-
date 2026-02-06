@extends('layouts.app')
@section('content')
<main class="min-vh-100 d-flex justify-content-center align-items-center">
    <div class="w-25 ">
        <div class="card" style="max-width: 640px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{route('admin.users.update')}}" method="post">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <select class="form-select" name="role_id">
                <option selected>Open this select menu</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" @if($role->id === $user->role->id) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Save" class="group relative mt-2 flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg bg-blue-600 px-4 py-3 text-sm font-bold text-white transition-all hover:bg-blue-500 active:scale-[0.98]">

        </form>
    </div>

</main>
@endsection