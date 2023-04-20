@extends('layouts.eventgo')

@section('title', Auth::user()->name)

@section('content')
    <div class="container my-5 m-0 p-0">
    
    <!-- Alerts -->
    @if (session('success'))
    <div class="alert alert-warning customAlert alert-dismissible fade show text-light border-0" role="alert">
        <strong>Update Successfull</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger errorAlert alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




        <div class="container d-flex flex-column">
            <div class="container ProfilePicture d-flex justify-content-center">
                <input type="image" src="{{ asset('storage/avatars/'.Auth::user()->image) }}" alt="{{ Auth::user()->image }}"  height="120" width="120" class="my-3 rounded-circle object-fit-cover" name="event_image">
            </div>
            <div class="container d-flex justify-content-around align-items-center my-4">
                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="container d-flex justify-content-center">
                        <div class="container profileInfo d-flex flex-column gap-5 p-4">
                        <div class="container d-flex gap-2 justify-content-center flex-column rounded">
                            <div class="profileName text-center text-light">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="profileName text-center text-light">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="container d-flex gap-2 justify-content-center flex-column rounded">
                            <div class="profileName text-center text-light">
                                <label for="image">Profile Picture</label>
                                <input type="file" name="image" id="image" class="form-control" >
                            </div>
                            <div class="profileBio text-center d-flex flex-column mt-3 text-light">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" cols="30" rows="10">{{ Auth::user()->bio }}</textarea>
                            </div>
                        </div>
                        <div class="container updateProfile d-flex justify-content-center my-2">
                            <button type="submit">Update</button>
                        </div>
                        </div>
                    </div>
                </form>

                <form action="{{ route('password-update') }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="container d-flex justify-content-center">
                        <div class="container profileInfo d-flex flex-column gap-3 p-4">
                        <div class="container d-flex gap-2 justify-content-center flex-column rounded">
                            <div class="profileName text-center text-light">
                                <label for="oldPassword">Current Password</label>
                                <input type="password" name="oldPassword" id="oldPassword" class="form-control">
                            </div>
                            <div class="profileName text-center text-light">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="profileName text-center text-light">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="container updateProfile d-flex justify-content-center my-2">
                            <button type="submit">Change Password</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection