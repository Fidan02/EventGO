@extends('layouts.eventgo')


@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row gap-3 d-flex justify-content-around ">
            <div class="col-5 my-5 p-0 m-0">
                <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="country-city">
                                <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                            </div>
                            <div class="event-date">
                                <h6 class="text-light mt-1">12/21/2023</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <!-- Tags and Title -->
                            <div class="d-flex flex-column">
                                <!-- For tags -->
                                <div class="d-flex gap-1">
                                    <p class="small event-cardTags">Party</p>
                                    <p class="small event-cardTags">Conference</p>
                                    <p class="small event-cardTags">Event</p>
                                </div>
                                <!-- Event Title -->
                                <div class="d-flex">
                                    <h3>This is an Event Title</h3>
                                </div>
                            </div>
                            <!-- Button To go the event -->
                            <div class="singleEventButton mt-2">
                                <a href="{{ route('home.show', ['home' => 'anythign']) }}">
                                    <span class="text-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-5 my-5 p-0 m-0">
            <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="country-city">
                                <h6 class="text-light mt-1">Skopje, North Macedonia</h6>
                            </div>
                            <div class="event-date">
                                <h6 class="text-light mt-1">12/21/2023</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <!-- Tags and Title -->
                            <div class="d-flex flex-column">
                                <!-- For tags -->
                                <div class="d-flex gap-1">
                                    <p class="small event-cardTags">Party</p>
                                    <p class="small event-cardTags">Conference</p>
                                    <p class="small event-cardTags">Event</p>
                                </div>
                                <!-- Event Title -->
                                <div class="d-flex">
                                    <h3>This is an Event Title</h3>
                                </div>
                            </div>
                            <!-- Button To go the event -->
                            <div class="singleEventButton mt-2">
                                <a href="#">
                                    <span class="text-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
