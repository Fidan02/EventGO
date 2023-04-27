@extends('layouts.eventgo')

@section('title', Auth::user()->name)

@section('content')
    <div class="container">
        <div class="ProfileInformation d-flex my-4 gap-2 justify-content-between container">
            <div class="profile">
                <div class="profileImage d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/avatars/'.Auth::user()->image) }}" alt="Host Image" width="120px" height="120px" class="rounded-circle object-fit-cover">
                    </div>
                    <div class="profileNameBio ms-4">
                        <div class="profileName text-light">
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                        <div class="profile-bio text-light small">
                            {{ Auth::user()->bio }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="profileEditBTN d-flex align-items-center">
                <div class="container">
                    <div class="profileFriends_Amount my-1">
                        <a href="{{ route('friends') }}" class="text-decoration-none text-light">Friends: 10</a>
                    </div>
                    <div class="profileEvents my-1">
                        <a href="" class="text-decoration-none text-light">Events: 10</a>
                    </div>
                </div>
                <div class="profileEDIT my-1">
                <a class="text-light mt-1 fs-5" href="{{ route('profile-edit')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>

        <div class="saved-events my-5">
            <h3 class="text-light">Saved Events:</h3>
                <div class="ProfileSavedEvents d-flex gap-2 container">
                    <div class="card bg-dark text-white" style="max-width: 400px; min-width: 400px;">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-between">
                                <div class="country-city">
                                    <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                                    <h6 class="text-light mt-1">12/21/2023</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <!-- Tags and Title -->
                                <div class="d-flex w-100 align-items-center justify-content-between ">
                                    <div class="d-flex">
                                        <h6>This is an Event Title</h6>
                                    </div>
                                    <div class="singleEventButton mt-2">
                                        <a href="{{ route('home.show', ['event_id' => 'anythign']) }}">
                                            <span class="text-center">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second -->
                    <div class="card bg-dark text-white" style="max-width: 400px; min-width: 400px;">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-between">
                                <div class="country-city">
                                    <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                                    <h6 class="text-light mt-1">12/21/2023</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <!-- Tags and Title -->
                                <div class="d-flex w-100 align-items-center justify-content-between ">
                                    <div class="d-flex">
                                        <h6>This is an Event Title</h6>
                                    </div>
                                    <div class="singleEventButton mt-2">
                                        <a href="{{ route('home.show', ['event_id' => 'anythign']) }}">
                                            <span class="text-center">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white" style="max-width: 400px; min-width: 400px;">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-between">
                                <div class="country-city">
                                    <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                                    <h6 class="text-light mt-1">12/21/2023</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <!-- Tags and Title -->
                                <div class="d-flex w-100 align-items-center justify-content-between ">
                                    <div class="d-flex">
                                        <h6>This is an Event Title</h6>
                                    </div>
                                    <div class="singleEventButton mt-2">
                                        <a href="{{ route('home.show', ['event_id' => 'anythign']) }}">
                                            <span class="text-center">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark text-white" style="max-width: 400px; min-width: 400px;">
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-between">
                                <div class="country-city">
                                    <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                                    <h6 class="text-light mt-1">12/21/2023</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <!-- Tags and Title -->
                                <div class="d-flex w-100 align-items-center justify-content-between ">
                                    <div class="d-flex">
                                        <h6>This is an Event Title</h6>
                                    </div>
                                    <div class="singleEventButton mt-2">
                                        <a href="{{ route('home.show', ['event_id' => 'anythign']) }}">
                                            <span class="text-center">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>









                </div><!-- Container-->
        </div>

        <div class="profileGallery my-5">
            <div class="profileEvents d-inline-flex my-1">
                <a href="" class="text-decoration-none text-light ">Gallery: 10</a>
            </div>
            
            <div class="ProfileSavedEvents d-flex gap-2 container">
            <div class="card bg-dark text-white" style="min-width: 400px; max-width: 400px;">
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
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
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
                </div> <!-- First Card-->

                <div class="card bg-dark text-white" style="min-width: 400px; max-width: 400px;">
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
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
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


                <div class="card bg-dark text-white" style="min-width: 400px; max-width: 400px;">
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
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.destroy', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-trash text-danger"></i></a>
                                    </h6>
                                </div>
                                <div class="container editGalleryBTN">
                                    <h6 class="text-light mt-2">
                                    <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_id' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
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
        </div><!-- Gallery Container  -->
    </div>
@endsection