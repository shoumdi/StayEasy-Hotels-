@extends('layouts.app')
@section('content')
<main class="min-vh-100 d-flex justify-content-center align-items-center">
    <form action="{{isset($role) ? route('admin.roles.update') : route('admin.roles.store') }}" method="post" class="w-25">
        @csrf
        @isset($role)
        @method('put')
        @endisset
        <input type="hidden" name="id" value="{{$role->id ?? null}}">
        <div class="d-flex flex-column mb-3">
            <label for="name">Name</label>
            <input type="name" name="name" id="name" placeholder="Role name" value="{{$role->name ?? ''}}"
                class="w-full bg-white/[0.03] border border-neutral-500/10 rounded-xl px-4 py-3 text-sm font-bold text-neutral-800 placeholder:text-slate-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none transition-all duration-200">
        </div>
        <div class="d-flex flex-column mb-3">
            <label for="desc">Description</label>
            <textarea name="description" id="desc" class="form-control" placeholder="Role description" rows="3" style="resize: none;">{{$role->description ?? ''}}</textarea>
        </div>

        <input type="submit" value="Save" class="w-100 btn btn-primary">

    </form>
</main>
@endsection