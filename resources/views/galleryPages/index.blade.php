@extends('layouts.eventgo')

@section('title', 'Gallery Forum')

@section('content')
<div class="container">
        <div class="row gap-3 d-flex justify-content-around ">
            <div class="col-3 my-5 p-0 m-0">
                <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="galleryUserName d-flex align-items-center">
                                <h6 class="text-light mt-1">User Name</h6>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <div class="d-flex align-items-center galleryUserName">
                                <div class="galleryCaption d-flex align-items-end">
                                    <p>This is a caption</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 my-5 p-0 m-0">
                <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="galleryUserName d-flex align-items-center">
                                <h6 class="text-light mt-1">User Name</h6>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <div class="d-flex align-items-center galleryUserName">
                                <div class="galleryCaption d-flex align-items-end">
                                    <p>This is a caption</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 my-5 p-0 m-0">
                <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="galleryUserName d-flex align-items-center">
                                <h6 class="text-light mt-1">User Name</h6>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_forum' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <div class="d-flex align-items-center galleryUserName">
                                <div class="galleryCaption d-flex align-items-end">
                                    <p>This is a caption</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection