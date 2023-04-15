@extends('layouts.eventgo')

@section('title', 'Edit Gallery')

@section('content')
    <div class="container my-5 d-flex justify-content-center">
        <h3 class="text-light">Edit Gallery</h3>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="#" method="POST" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">
            @csrf
            <div class="editImage d-flex inputBG flex-column align-items-center my-5">
                <input class="form-control" type="file" id="event_image" name="event_image" placeholder="Add Image">
                <input type="image" src="{{ asset('images/imglandscape.png') }}" height="120" class="my-3 rounded" name="event_image">
            </div>
            <div class="EditText inputBG">
                <textarea name="event_desc" id="event_desc" cols="30" rows="10" placeholder="Add caption"></textarea>
            </div>
            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit" class="">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection