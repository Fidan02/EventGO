@extends('layouts.eventgo')

@section('title', 'Attending Events')

@section('content')
@if(!is_null($events->attendingEvents) && count($events->attendingEvents) > 0)
<div class="container mt-5 mb-3 text-light">
    <h1>Your Attending Events</h1>
</div>
@endif
<div class="container">
    @if(!is_null($events->attendingEvents) && count($events->attendingEvents) > 0)
        <div class="row gap-3 d-flex justify-content-around ">
            @foreach($events->attendingEvents as $event)
            <div class="col-5 my-5 p-0 m-0">
                <div class="card bg-dark text-white" style="max-width: 700px;">
                    <img src="{{ asset('storage/events/'. $event->image) }}" class="card-img object-fit-cover" alt="Stony Beach"/>
                    <div class="card-img-overlay d-flex flex-column">
                        <!-- For the country and date -->
                        <div class="d-flex justify-content-between">
                            <div class="country-city">
                                <h6 class="text-light mt-1">{{$event->country->country_name}}, {{ $event->city->city_name }}</h6>
                            </div>
                            <div class="event-date">
                                <h6 class="text-light mt-1">{{ $event->start_date}}</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-auto">
                            <!-- Tags and Title -->
                            <div class="d-flex flex-column">
                                <!-- For tags -->
                                <div class="d-flex gap-1">
                                    @foreach($event->tags as $tag)
                                        <p class="small event-cardTags">{{ $tag->tag_name}}</p>
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
    <div class="container my-5 text-light text-center fs-6">
        <h1>Your attending events will show up here!</h1>
    </div>
    @endif
    </div>
@endsection