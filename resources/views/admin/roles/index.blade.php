@extends('layouts.app')
@section('content')
<div class="grid grid-cols-12">
    <asid class="lg:col-span-3">
        <nav>
            <ul>
                <li class="p-3 bg-red-300">
                    Roles Managment
                </li>
                <li class="p-3 text-white">
                    Hotels Managment
                </li>

                <li class="p-3 text-white">
                    Rooms Managment
                </li>
            </ul>
        </nav>
    </asid>
    <main class="col-span-9">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b border-gray-300 text-white">Id</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 text-white">Name</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 text-white text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-200 text-white">{{$role->id}}</td>
                    <td class="px-4 py-2 border-b border-gray-200 text-white">{{$role->name}}</td>
                    <td class="px-4 py-2 border-b border-gray-200">
                        <div class="flex justify-end gap-2">
                            <form action="{{route('admin.roles.edit')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <button type="submit" class="size-5 text-orange-600 hover:text-white"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <button type="submit" class="text-red-600 hover:text-white"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
</div>
@endsection