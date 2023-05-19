@extends('layouts.eventgo')

@section('title', 'Gallery Forum')

@section('content')
<div class="container">
    <!-- Alerts -->
    @if (session('success'))
    <div class="alert alert-warning customAlert alert-dismissible fade show text-light border-0 my-5 m-5" role="alert">
        <strong>Deleted Successfull</strong>
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

    @if($gallery && count($gallery) > 0)
        <div class="row gap-5 d-flex my-5 justify-content-center ">
            @foreach($gallery as $gl)
                <div class="col-3 my-1 p-0 m-0">
                    <div class="card bg-dark text-white" style="max-width: 700px;">
                        <img src="{{ asset('storage/gallery/'. $gl->image)}}" class="card-img object-fit-cover" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="d-flex justify-content-between">
                                <div class="galleryUserName d-flex align-items-center">
                                    <h6 class="text-light mt-1">{{ $gl->users->name}}</h6>
                                </div>
                                <div class="d-flex ms-1 justify-content-center align-items-center gap-1">
                                    @if($gl->user_id === auth()->id())
                                    <div class="container editGalleryBTN">
                                        <form class="p-0" action="{{ route('gallery-forum.destroy', ['gallery_id' => $gl->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="deleteGalleryBTN p-1 text-light fs-5" type="submit"><i class="fa-solid fa-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                    <div class="container editGalleryBTN">
                                        <h6 class="text-light mt-2">
                                        <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_id' => $gl->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </h6>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <div class="galleryUserName galleryCaption p-1">
                                    <h6 class="small">{{ $gl->caption }} </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container my-5">
            <h1 class="text-center text-light">0 GALLERIES</h1>
        </div>
    @endif
</div>
@endsection