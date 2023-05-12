@extends('layouts.eventgo')

@section('title', Auth::user()->name)

@section('content')
    <div class="container">
        <div class="ProfileInformation d-flex my-4 gap-2 justify-content-between container">
            <div class="profile">
                <div class="profileImage d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/avatars/'.$users->image) }}" alt="Host Image" width="120px" height="120px" class="rounded-circle object-fit-cover">
                    </div>
                    <div class="profileNameBio ms-4">
                        <div class="profileName text-light">
                            <h2>{{ $users->name }}</h2>
                        </div>
                        <div class="profile-bio text-light small">
                            {{ $users->bio }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="profileEditBTN d-flex align-items-center">
                <div class="container">
                    <div class="profileFriends_Amount my-1">
                        <a href="{{ route('friends') }}" class="text-decoration-none text-light">Friends:
                            @if(count($friends) > 0)
                                {{ $friends->count() }}
                            @else
                                0
                            @endif
                        </a>
                    </div>
                    <div class="profileEvents my-1">
                        <a href="{{ route('user-events') }}" class="text-decoration-none text-light">Events:
                            @if($users->events->count() > 0)
                                {{ $users->events->count() }}
                            @else
                                0
                            @endif
                        </a>
                    </div>
                </div>
                <div class="profileEDIT my-1">
                <a class="text-light mt-1 fs-5" href="{{ route('profile-edit')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        </div>

        <div class="saved-events my-5">
            <h3 class="text-light">Saved Events:</h3>
                @if(!is_null($users->savedEvents) && count($users->savedEvents) > 0)
                    <div class="ProfileSavedEvents d-flex gap-2 container">
                        @foreach($users->savedEvents as $user)
                            <div class="card bg-dark text-white" style="max-width: 400px; min-width: 400px;">
                                <img src="{{ asset('storage/events/'. $user->image) }}" class="card-img object-fit-cover" alt="{{ $user->image }}"/>
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="d-flex justify-content-between">
                                                <div class="country-city">
                                                    <h6 class="text-light mt-1">{{ $user->country->country_name }}, {{ $user->city->city_name }}</h6>
                                                    <h6 class="text-light mt-1">{{ $user->start_date }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-auto">
                                            <div class="d-flex w-100 align-items-center justify-content-between ">
                                            <div class="d-flex">
                                                <h6>{{ $user->title }}</h6>
                                            </div>
                                            <div class="singleEventButton mt-2">
                                                <a href="{{ route('home.show', ['event_id' => $user->id]) }}">
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
                    <div class="container my-3 text-light">
                        <p class="ms-2">0 Saved Posts</p>
                    </div>
                @endif
            </div>

        <div class="profileGallery my-5 text-center">
            <div class="profileEvents d-inline-flex my-1">
                <span class="text-decoration-none text-light ">Gallery: {{ $users->galleries->count() }}</span>
            </div>
            
            @if(!is_null($users->galleries) && count($users->galleries) > 0)
            <div class="w-100 my-3 d-flex flex-wrap justify-content-center gap-3 container">
                @foreach($users->galleries as $gl)
                    <div class="card bg-dark text-white" style="min-width: 400px; max-width: 400px;">
                        <img src="{{ asset('storage/gallery/'. $gl->image)}}" class="card-img" alt="Stony Beach"/>
                        <div class="card-img-overlay d-flex flex-column">
                            <!-- For the country and date -->
                            <div class="d-flex justify-content-end">
                                <div class="d-flex gap-2">
                                    <div class="container editGalleryBTN">
                                        <h6 class="text-light mt-2">
                                            <form class="p-0" action="{{ route('gallery-forum.destroy', ['gallery_id' => $gl->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="deleteGalleryBTN p-1 text-light fs-5" type="submit"><i class="fa-solid fa-trash text-danger"></i></button>
                                            </form>
                                        </h6>
                                    </div>
                                    <div class="container editGalleryBTN">
                                        <h6 class="text-light mt-2">
                                        <a class="text-light mt-1 fs-5" href="{{ route('gallery-forum.edit', ['gallery_id' => $gl->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <div class="d-flex align-items-center">
                                    <div class="galleryUserName galleryCaption p-1">
                                        <p class="small">{{ $gl->caption }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="container my-3 text-light">
                    <p class="ms-2">0 Galleries</p>
                </div>
            @endif
        </div><!-- Gallery Container  -->
    </div>
@endsection