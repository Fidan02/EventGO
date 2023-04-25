@extends('layouts.eventgo')


@section('title', 'Edit')


@section('content')
    <div class="container my-5">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="editMain d-flex gap-3 justify-content-around container">
            <!-- Left Side of the edit -->
                <div class="container editLeft">
                    <div class="EditTitle inputBG">
                        <input type="text" class="form-control" value="{{ $event->title }}">
                    </div>
                    <div class="Location my-5">
                        <div class="cityCountryEdit gap-5 d-flex justify-content-between container my-3">
                            <div class="dropdown w-100">
                                <button class="dropdown-toggle countryButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $event->country->country_name }}
                                </button>
                                @if($country && count($country) > 0)
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach($country as $cr)
                                            <li><a class="dropdown-item" href="#">{{ $cr->country_name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="inputBG country">
                                <div class="dropdown">
                                    <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $event->city->city_name }}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item text-light" href="#">Soon</a></li>      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="address mb-3 w-75 inputBG">
                            <input type="text" class="form-control" value="{{ $event->address }}">
                        </div>
                    </div>
                    <div class="editImage d-flex inputBG flex-column align-items-center">
                        <input class="form-control" type="file" id="event_image" name="event_image">
                        <input type="image" src="{{ asset('storage/events/'.$event->image) }}" height="120" class="my-3 rounded" name="event_image">
                    </div>
                    <div class="tags d-flex gap-3">
                        <div class="tag1">
                            <div class="dropdown">
                            <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tag 1
                            </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tag1">
                            <div class="dropdown">
                            <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tag 1
                            </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tag1">
                            <div class="dropdown">
                            <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tag 1
                            </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Side -->
                <div class="container editRight">
                    <div class="EditTime inputBG">
                        <input type="date" class="form-control mb-3">
                        <input type="date" class="form-control mb-3">
                        <input type="time" class="form-control mb-3">
                    </div>
                        <br><br><br>
                    <div class="EditText inputBG">
                        <textarea name="event_desc" id="event_desc" cols="30" rows="10"></textarea>
                    </div>
                </div>












            </div>

            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit" class="">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection