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




        <form action="{{ route('update') }}" method="POST">
        @method('PUT')
        @csrf
            <div class="container ProfilePicture d-flex justify-content-center">
                <input type="image" src="{{ asset('images/'.Auth::user()->image) }}" height="120" class="my-3 rounded" name="event_image">
            </div>
            <div class="container profileInfo d-flex gap-3 p-4">
            <div class="container w-25 d-flex gap-2 justify-content-center flex-column rounded">
                <div class="profileName text-center text-light">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                </div>
                <div class="profileName text-center text-light">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                </div>
            </div>
            <div class="container w-25 d-flex gap-2 justify-content-center flex-column rounded">
                <div class="profileName text-center text-light">
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{ auth()->user()->image }}">
                </div>
                <div class="profileBio text-center text-light">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" cols="30" rows="10">{{ Auth::user()->bio }}</textarea>
                </div>
            </div>
            </div>
            <div class="container updateProfile d-flex justify-content-center my-2">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection