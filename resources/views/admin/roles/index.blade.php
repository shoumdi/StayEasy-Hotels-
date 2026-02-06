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
        <table class="table">
            <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">Name</th>
                    <th class="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td class="col">{{$role->id}}</td>
                    <td class="col">{{$role->name}}</td>
                    <td class="col">
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{route('admin.roles.edit')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$role->id}}">
                                <button type="submit" class="size-5 text-orange-600 hover:text-white"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="{{route('admin.roles.delete')}}" method="post">
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