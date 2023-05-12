@extends('layouts.eventgo')

@section('title', 'Create Gallery')

@section('content')
    <div class="container my-5 d-flex justify-content-center">
        <h3 class="text-light">Create a Gallery</h3>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="{{ route('gallery-forum.store')}}" method="POST" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">
            @csrf
            <div class="editImage d-flex inputBG flex-column align-items-center my-5">
                <input class="form-control" type="file" name="image" placeholder="Add Image">
            </div>
            <div class="EditText inputBG w-100">
                <textarea type="text" name="caption" class="form-control w-100" rows="10" cols="10" style="resize: none;" placeholder="Add caption"></textarea>
            </div>
            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit" class="">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection