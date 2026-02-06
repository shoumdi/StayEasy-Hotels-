@extends('layouts.app')
@section('content')
<main>
    <div class="d-flex justify-content-center align-items-center">
        <form class="w-50" method="post" action="{{route('profile.update')}}" enctype="multipart/form-data" >
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Profile picture</label>
                <div id="formFileMultiple" class="d-flex justify-content-start align-items-center gap-3">
                    <img id="profilePicture" src="{{$user->image->url ?? asset('assets/images/profile/default.jpg')}}" alt="{{$user->name}} picture" class="rounded-circle bg-white" style="height: 64px;width:64px">
                    <label class="btn btn-primary" for="file-upload">
                        Change picture
                        <input type="file" name="picture" id="file-upload" accept="image/*" class="d-none">
                    </label>
                    <input class="btn btn-danger" type="button" id="delete" value="Delete picture">
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="•••••••••">
            </div>
            <input class="w-100 btn btn-outline-success" type="submit" value="valider">
        </form>
    </div>
</main>
@endsection
@push('scripts')
<script>
    const fileInput = document.getElementById('file-upload');

    fileInput.addEventListener('change', (e) => {
        const profilePicture = document.getElementById('profilePicture');
        const picture = e.target.files[0];
        if (picture !== undefined) {
            profilePicture.src = URL.createObjectURL(picture);
            profilePicture.onload = () => {
                URL.revokeObjectURL(profilePicture.src);
            }
        } else profilePicture.src = ''
    })

    document.getElementById('delete').addEventListener('click', () => {
        fileInput.value = null
        fileInput.dispatchEvent(
            new Event('change', {
                bubbles: false,
                cancelable: true
            })
        )

    })
</script>
@endpush