@extends('layouts.app')
@section('content')
    <main class="w-full h-screen grid place-items-center overflow-hidden">

        <div class="w-full lg:w-[35%] flex flex-col justify-center items-center px-6 md:px-20 relative overflow-y-auto">
            <form class="w-full flex flex-col gap-3" action="{{route('auth.login')}}" method="post">
                @csrf
                <div class="flex flex-col">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="someone@gmail.com"
                    class="w-full bg-white/[0.03] border border-neutral-500/10 rounded-xl px-4 py-3 text-sm font-bold text-neutral-800 placeholder:text-slate-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none transition-all duration-200">
                </div>

                <div class="flex flex-col">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password"
                    class="w-full bg-white/[0.03] border border-neutral-500/10 rounded-xl px-4 py-3 text-sm font-bold text-neutral-800 placeholder:text-slate-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none transition-all duration-200">
                </div>
                <input type="submit" value="Login" class="group relative mt-2 flex w-full items-center justify-center gap-2 overflow-hidden rounded-lg bg-blue-600 px-4 py-3 text-sm font-bold text-white transition-all hover:bg-blue-500 active:scale-[0.98]">
        </form>
        </div>
    </main>
@endsection