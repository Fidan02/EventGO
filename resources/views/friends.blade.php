@extends('layouts.eventgo')

@section('title', 'Friends')

@section('content')
    @if(session('added'))
        <div class="alert my-5 w-25 customAlerttwo alert-dismissible fade show text-light border-1 border-light rounded" role="alert">
            <strong>Added new Friend!</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container text-light mt-4 mb-3">
        <h1>Friends:</h1>
    </div>

    <!-- Accepted Friends -->
    <div class="container freinds-container row">
    @if(!is_null($friends) && count($friends) > 0)
        <div class="col-4">
            @foreach($friends as $friend)
                @if($friend->friend_id == auth()->id())
                    <div class="accepted friend my-1 d-flex">
                        <div class="friend-img">
                            <a href="#" class="host-image d-flex justify-content-center align-items-center">
                                <img src="{{ asset('storage/avatars/'. App\Models\User::find($friend->user_id)->image) }}" alt="Host Image" class="rounded-circle object-fit-cover" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        <div class="friend-info w-100">
                            <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                                <h4>{{ App\Models\User::find($friend->user_id)->name }}</h4>
                                <a href="{{ route('remove', ['id' => $friend->friend_id])}}">
                                    <span class="mt-1"><i class="fa-solid fa-user-xmark text-danger"></i></span>
                                </a>
                            </div>
                            <div class="container friend-bio small">
                                @if(!is_null(App\Models\User::find($friend->user_id)->bio))
                                    <p>{{ App\Models\User::find($friend->user_id)->bio }}</p>
                                @else
                                    <p>It's really quiet...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="accepted friend my-1 d-flex">
                        <div class="friend-img">
                            <a href="#" class="host-image d-flex justify-content-center align-items-center">
                                <img src="{{ asset('storage/avatars/'. App\Models\User::find($friend->friend_id)->image) }}" alt="Host Image" class="rounded-circle object-fit-cover" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        <div class="friend-info w-100">
                            <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                                <h4>{{ App\Models\User::find($friend->friend_id)->name }}</h4>
                                <a href="{{ route('remove', ['id' => $friend->friend_id])}}">
                                    <span class="mt-1"><i class="fa-solid fa-user-xmark text-danger"></i></span>
                                </a>
                            </div>
                            <div class="container friend-bio small">
                                @if(!is_null(App\Models\User::find($friend->friend_id)->bio))
                                    <p>{{ App\Models\User::find($friend->friend_id)->bio }}</p>
                                @else
                                    <p>It's really quiet...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="col-4 container my-5 d-flex align-items-top justify-content-center text-light">
            <h6>Currently you have no friends!</h6>
        </div>
    @endif

    <!-- Pending friend Requests -->
    @if($friendRequests && count($friendRequests) > 0)
        <div class="col-4">
        @foreach($friendRequests as $friend)
            <div class="pending friend my-1 d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/avatars/'. App\Models\User::find($friend->user_id)->image) }}" alt="Host Image" class="rounded-circle object-fit-cover" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info w-100">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h4>{{ App\Models\User::find($friend->user_id)->name }}</h4>
                        @if($friend->friend_id == auth()->id())
                            <a href="{{ route('accept', ['id' => $friend->user_id] )}}">
                                <span class="mt-1"><i class="fa-solid fa-clock text-warning"></i></span>
                            </a>
                        @else
                            <a href="{{ route('accept', ['id' => $friend->friend_id] )}}">
                                <span class="mt-1"><i class="fa-solid fa-clock text-warning"></i></span>
                            </a>
                        @endif
                    </div>
                    <div class="container friend-bio small">
                        @if(!is_null(App\Models\User::find($friend->user_id)->bio))
                            <p>{{ App\Models\User::find($friend->user_id)->bio }}</p>
                        @else
                            <p>It's really quiet...</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <div class="col-4 container d-flex my-5 align-items-top justify-content-center text-light">
            <h4>No requests</h4>
        </div>
    @endif

        <!-- Suggested People  -->
        <div class="suggested-container col-4">
            <div class="container text-center text-light">
                <h6>People you may know:</h6>
            </div>
            @if($people && count($people) > 0)
                @foreach($people as $person)
                    @if( $person->id !== auth()->id())
                        <div class="sug-friend friend my-1 d-flex">
                            <div class="friend-img">
                                <a href="#" class="host-image d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                                </a>
                            </div>
                            <div class="friend-info w-100">
                                <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                                    <h4>{{ $person->name }}</h4>
                                    <a href="{{ route('addfriend', ['id' => $person->id] )}}" class="mt-1 text-light"><i class="fa-solid fa-user-plus"></i></a>
                                </div>
                                <div class="container friend-bio small">
                                @if(!is_null($person->bio))
                                    <p>{{ $person->bio }}</p>
                                @else
                                    <p>It's really quiet...</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="container text-center my-5 text-light fw-bold">
                    <p>No friend Suggestions</p>
                </div>
            @endif
        </div>
    </div>
@endsection