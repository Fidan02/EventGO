@extends('layouts.eventgo')

@section('title', 'Edit Gallery')

@section('content')

    <!-- Alerts -->
    @if (session('success'))
    <div class="alert alert-warning customAlert alert-dismissible fade show text-light border-0 my-5 m-5" role="alert">
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


    <div class="container my-5 d-flex justify-content-center">
        <h3 class="text-light">Edit Gallery</h3>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="{{ route('gallery-forum.update', ['gallery_id' => $gallery->id]) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">
            @method('PUT')
            @csrf
            <div class="editImage d-flex inputBG flex-column align-items-center my-5">
                <input class="form-control" type="file" id="gallery_image" name="gallery_image" placeholder="Add Image">
                <input type="image" src="{{ asset('storage/gallery/'. $gallery->image) }}" height="120" class="my-3 rounded object-fit-cover" name="gallery_image">
            </div>
            <div class="EditText inputBG">
                <textarea name="caption" id="caption" cols="30" rows="10" style="resize: none;" placeholder="Add caption" class="p-2">{{ $gallery->caption }}</textarea>
            </div>
            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection