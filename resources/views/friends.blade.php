@extends('layouts.eventgo')

@section('title', 'Friends')

@section('content')
    <div class="container text-light mt-4 mb-3">
        <h1>Freinds:</h1>
    </div>
    <div class="container freinds-container row">
        <div class="col-4">
            <div class="accepted friend d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h4>User Name</h4>
                        <span class="mt-1"><i class="fa-solid fa-user-xmark text-danger"></i></span>
                    </div>
                    <div class="container friend-bio small">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti laboriosam iste illum qui nemo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="pending friend d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h4>User Name</h4>
                        <span class="mt-1"><i class="fa-solid fa-clock text-warning"></i></span>
                    </div>
                    <div class="container friend-bio small">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti laboriosam iste illum qui nemo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="suggested-container col-4">
            <div class="container text-center text-light">
                <h6>People you may know:</h6>
            </div>
            <div class="accepted friend d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h4>User Name</h4>
                        <span class="mt-1"><i class="fa-solid fa-user-plus"></i></span>
                    </div>
                    <div class="container friend-bio small">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti laboriosam iste illum qui nemo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection