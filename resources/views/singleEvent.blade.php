@extends('layouts.eventgo')

@section('title', 'SingleEvent')

@section('content')
    <div class="container my-4 d-flex justify-content-between">
        <div class="eventTitle">
            <h1>{{ $event->title }}</h1>
        </div>
        <div class="singleevent-date">
            From: <span class="singleevent-startdate">{{ $event->start_date }}</span> | 
            <span class="singleevent-enddate">{{ $event->end_date }}</span>
        </div>
    </div>

    <div class="container d-flex justify-content-between">
        <!-- Single Event Image and Edit btn -->
        <div class="card singleEventCard-img bg-dark text-white">
            <img src="{{ asset('storage/events/'.$event->image) }}" style="height: 100%;" class="card-img object-fit-cover" alt="Stony Beach"/>
            <div class="card-img-overlay d-flex flex-column">
                <!-- Edit BTN -->
                <div class="d-flex justify-content-between">
                @if(Auth::user()->id === $event->user_id)
                    <div class="singleevent-edit-btn "> 
                        <a class="text-light mt-1 fs-5" href="{{ route('home.edit', ['home' => $event->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                @endif
                </div>
            </div>
        </div>

        <!-- Event Info card -->
        <div class="container  d-flex justify-content-center w-50">
            <div class="singleEventInfo-card p-2 rounded">
                <div class="container">
                    <div class="eventbio p-1">
                        <p>{{ $event->description }}</p>
                    </div>
                    <div class="eventTime my-1">
                        <h6 class="mt-1">From: {{ $event->time }}</h6>
                    </div>
                </div>
                <div class="container">
                    <div class="singleEventTags text-light gap-1 d-flex">
                        @foreach($event->tags as $tag)
                            <p class="small event-cardTags">{{ $tag->tag_name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="countryAddress text-left mt-auto">
                    <div class="country-city my-1">
                        <h6 class="mt-1 text-light">{{ $event->city->city_name }}, {{ $event->country->country_name }}</h6>
                    </div>
                    <div class="Eventaddress">
                        <h6 class="text-light mt-1">{{ $event->address }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Like / Save / Attend and Post Comment Input -->
    <div class="container d-flex justify-content-between my-3">
        <div class="like-save-attend w-50 d-flex gap-3">
            <div class="like-btn">
                <a href="#" class="d-flex justify-content-center flex-column align-items-center">
                    @php
                        $likes = $event->likes()->where('user_id', auth()->id())->first();
                        $icon = is_null($likes) || is_null($likes->like) ? 'text-light fa-regular fa-heart' : 'text-danger fa-solid fa-heart';
                    @endphp
                    <i class="{{ $icon }}"></i>
                    <span class="text-light" style="font-size: 12px;">{{ $event->likes()->count() }}</span>
                </a>
            </div>
            <div class="save-btn">
                @php 
                    $saved = $event->savedEvents()->where('user_id', auth()->id())->first();
                    $is_saved = (is_null($saved) || is_null($saved->user_id === auth()->id())) ? 'text-light fa-regular fa-bookmark' : 'text-primary fa-solid fa-bookmark';
                @endphp
                <a href="#" class="d-flex flex-column justify-content-center align-items-center">
                    <i class="{{ $is_saved }}"></i>
                    <span class="text-light" style="font-size: 12px;">{{ $event->savedEvents()->count() }}</span>
                </a>
            </div>

            @php 
                $attending = $event->attending()->where('user_id', auth()->id())->first();
                $is_attending = (is_null($attending) || is_null($attending->user_id === auth()->id())) ? 'attend-btn' : 'activeAttend';
                $icon = (is_null($attending) || is_null($attending->user_id === auth()->id())) ? 'fa-solid fa-arrow-up' : 'fa-sharp fa-solid fa-xmark';
                $message = (is_null($attending) || is_null($attending->user_id === auth()->id())) ? 'Attend' : 'Attending';
            @endphp
            <div class="{{ $is_attending}}">
                <a href="#">
                    <i class="{{ $icon }}"></i>
                    <span class="ms-1">{{ $message }}</span>
                </a>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center w-50">
            <div class="comment-input">
                <form action="" class="d-flex gap-2">
                    <input type="text" class="form-control text-light" name="comment" id="comment" placeholder="Comment">
                    <button class="post-commentbtn" type="submit">Post</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Comment Section and Host Information -->
    <div class="container comment-host d-flex justify-content-between">
        <!-- User Info -->
        <div class="container host-info my-5">
            <div>
                <h6 class="text-light">Host Info:</h6>
                <hr class="border border-2 rounded">
            </div>
            <div class="host-info-info my-3 d-flex">
                <a href="#" class="host-image d-inline-flex">
                    <img src="{{ asset('storage/avatars/'.$event->users->image) }}" alt="Host Image" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;">
                </a>
                <div class="ms-2 host-name">
                    <div class="container text-light">
                        <h4>{{ $event->users->name }}</h4>
                    </div>
                    <div class="container text-light">
                        <h4>{{ $event->users->email }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container comment-section">
            @if($event->comments && count($event->comments) > 0)
                @foreach($event->comments as $comment)
                    <div class="container comment d-flex my-2 rounded ">
                        <div class="comment-image">
                            <a href="#" class="host-image d-flex align-items-center container mt-2">
                                <img src="{{ asset('storage/avatars/'.$comment->users->image) }}" alt="Host Image" style="width: 50px; height: 50px;">
                            </a>
                        </div>
                        <div class="content w-100">
                            <div class="commenter-info w-100">
                                <div class="user-date my-1 d-flex justify-content-between">
                                    <div class="commenter-name text-light border-bottom border-secondary">
                                        {{ $comment->users->name}}
                                    </div>
                                    <div class="date-delete d-flex gap-1">
                                    @if(Auth::user()->id === $comment->user_id)
                                        <div class="delete">
                                            <form action="#">
                                                <button class="deleteComment" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                        <div class="comment-date small">
                                            {{ $comment->created_at}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-content">
                                {{ $comment->content }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="container comment d-flex rounded text-light">
                <div class="text-center w-100 my-3">
                    <h2 class="text-center">0 comments</h2>
                </div>
            </div>
            @endif
        </div>
    </div>
    


@endsection