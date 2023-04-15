@extends('layouts.eventgo')

@section('title', 'SingleEvent')

@section('content')
    <div class="container my-4 d-flex justify-content-between">
        <div class="eventTitle">
            <h1>Event Title</h1>
        </div>
        <div class="singleevent-date">
            From: <span class="singleevent-startdate">12/12/2023</span> | 
            <span class="singleevent-enddate">12/12/2023</span>
        </div>
    </div>

    <div class="container d-flex justify-content-between">
        <!-- Single Event Image and Edit btn -->
        <div class="card singleEventCard-img bg-dark text-white">
            <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" style="height: 100vh;" class="card-img" alt="Stony Beach"/>
            <div class="card-img-overlay d-flex flex-column">
                <!-- Edit BTN -->
                <div class="d-flex justify-content-between">
                    <div class="singleevent-edit-btn">
                        <a class="text-light mt-1 fs-5" href="{{ route('home.edit', ['home' => 'anythign'])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Info card -->
        <div class="container  d-flex justify-content-center w-50">
            <div class="singleEventInfo-card p-2 rounded">
                <div class="container">
                    <div class="eventbio p-1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga iusto ut quia eum temporibus ipsa repellendus pariatur tenetur rem error alias, vitae natus quasi, vel reiciendis? Veritatis repudiandae iusto vero.</p>
                    </div>
                    <div class="eventTime my-1">
                        <h6 class="mt-1">From: 20:00</h6>
                    </div>
                </div>
                <div class="container">
                    <div class="singleEventTags text-light gap-1 d-flex">
                        <p class="small event-cardTags">Party</p>
                        <p class="small event-cardTags">Conference</p>
                        <p class="small event-cardTags">Event</p>
                    </div>
                </div>
                <div class="countryAddress text-left mt-auto">
                    <div class="country-city my-1">
                        <h6 class="mt-1 text-light">Skopje, North Macedonia</h6>
                    </div>
                    <div class="Eventaddress">
                        <h6 class="text-light mt-1">Albert Stanikj No:1</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Like / Save / Attend and Post Comment Input -->
    <div class="container d-flex justify-content-between my-3">
        <div class="like-save-attend w-50 d-flex gap-3">
            <div class="like-btn">
                <a href="#" class="d-flex justify-content-center align-items-center">
                    <i class="fa-regular fa-heart"></i>
                </a>
            </div>
            <div class="save-btn">
                <a href="#" class="d-flex justify-content-center align-items-center">
                    <i class="fa-regular fa-bookmark"></i>
                </a>
            </div>
            <div class="attend-btn">
                <a href="#">
                    <i class="fa-solid fa-arrow-up"></i>
                    <span>Attend</span>
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
                    <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 80px; height: 80px;">
                </a>
                <div class="ms-2 host-name">
                    <div class="container text-light">
                        <h4>Host Name</h4>
                    </div>
                    <div class="container text-light">
                        <h4>example@gmail.com</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container comment-section">
            <div class="container comment d-flex rounded ">
                <div class="comment-image">
                    <a href="#" class="host-image d-flex align-items-center container mt-2">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 50px; height: 50px;">
                    </a>
                </div>
                <div class="content w-100">
                    <div class="commenter-info w-100">
                        <div class="user-date my-1 d-flex justify-content-between">
                            <div class="commenter-name text-light border-bottom border-secondary">
                                User Name
                            </div>
                            <div class="date-delete d-flex gap-1">
                                <div class="delete">
                                    <form action="#">
                                        <button class="deleteComment" type="submit">Delete</button>
                                    </form>
                                </div>
                                <div class="comment-date small">
                                    12/12/2002
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptate corrupti voluptatum necessitatibus repellat, accusantium voluptatibus facere sapiente iste eos! Dolor molestias velit ratione tenetur eligendi, mollitia totam dolores obcaecati?
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection