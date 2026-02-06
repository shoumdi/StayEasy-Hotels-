@extends('layouts.app')
@section('content')
<main class="size-full grid place-items-center">
    <form action="{{route('admin.roles.update')}}" method="post" class="w-[35%]">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{$role->id ?? null}}">
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="name" name="name" id="name" placeholder="Role name" value="{{$role->name ?? ''}}"
                class="w-full bg-white/[0.03] border border-neutral-500/10 rounded-xl px-4 py-3 text-sm font-bold text-neutral-800 placeholder:text-slate-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none transition-all duration-200">
        </div>

        <input type="submit" value="Save" class="group relative mt-2 flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg bg-blue-600 px-4 py-3 text-sm font-bold text-white transition-all hover:bg-blue-500 active:scale-[0.98]">

    </form>
</main>
@endsection