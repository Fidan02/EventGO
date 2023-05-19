@extends('layouts.eventgo')

@section('title', Auth::user()->name)


@section('content')

<div class="container">
        @if($events && count($events) > 0)
        <div class="container mt-5 text-light">
            <h1>Your Created Events:</h1>
        </div>
            <div class="row gap-3 d-flex justify-content-start ">
                @foreach($events as $event)
                    <div class="col-5 my-5 p-0 m-0">
                        <div class="card bg-dark text-white" style="max-width: 700px;">
                            <img src="{{ asset('storage/events/'.$event->image) }}" class="card-img object-fit-cover" alt="Stony Beach"/>
                            <div class="card-img-overlay d-flex flex-column">
                                <!-- For the country and date -->
                                <div class="d-flex justify-content-between">
                                    <div class="country-city">
                                        <h6 class="text-light mt-1">
                                            {{ $event->country->country_name }}, {{ $event->city->city_name }} 
                                        </h6>
                                    </div>
                                    <div class="event-date">
                                        <h6 class="text-light mt-1">{{ $event->start_date }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-auto">
                                    <!-- Tags and Title -->
                                    <div class="d-flex flex-column">
                                        <!-- For tags -->
                                        <div class="d-flex gap-1">
                                            @foreach($event->tags as $tag)
                                                <p class="small event-cardTags">{{$tag->tag_name}}</p>
                                            @endforeach
                                        </div>
                                        
                                        <!-- Event Title -->
                                        <div class="d-flex">
                                            <h3>{{ $event->title }}</h3>
                                        </div>
                                    </div>
                                    <!-- Button To go the event -->
                                    <div class="singleEventButton mt-2">
                                        <a href="{{ route('home.show', ['event_id' => $event->id]) }}">
                                            <span class="text-center">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="container text-center my-5">
                <div class="text-light"><h1>You have not created any events!</h1></div>
            </div>
            <div class="container text-center justify-content-center d-flex gap-2 my-5">
                <div><a class="text-decoration-none btn btn-outline-light" href="{{ route('home.create')}}">Create One</a></div>
                <div><a class="text-decoration-none btn btn-outline-danger" href="{{ route('profile')}}">Go Back</a></div>
            </div>
        @endif
    </div>
    


@endsection