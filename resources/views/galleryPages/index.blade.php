@extends('layouts.eventgo')

@section('title', 'Gallery Forum')

@section('content')
<div class="container">
    @if($gallery && count($gallery) > 0)
        <div class="row gap-3 d-flex justify-content-start ">
            @foreach($gallery as $gl)
                <div class="col-3 my-5 p-0 m-0">
                    <div class="card bg-dark text-white" style="max-width: 700px;">
                        <img src="{{ asset('storage/gallery/'. $gl->image)}}" class="card-img object-fit-cover" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-between">
                                <div class="galleryUserName d-flex align-items-center">
                                    <h6 class="text-light mt-1">{{ $gl->users->name}}</h6>
                                </div>
                                <div class="d-flex gap-2">
                                    @if($gl->user_id === auth()->id())
                                    <div class="container editGalleryBTN">
                                        <h6 class="text-light mt-2">
                                        <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                        </h6>
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
                                <div class="d-flex align-items-center galleryUserName">
                                    <div class="galleryCaption d-flex align-items-end">
                                        <h6 class="small">{{ $gl->caption }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection