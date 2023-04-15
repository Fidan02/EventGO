@extends('layouts.eventgo')


@section('title', 'Create')


@section('content')
    <div class="container my-5">
        <h3 class="text-light">Create an Event</h3>
    </div>
    <div class="container my-5">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="editMain d-flex gap-3 justify-content-around container">
            <!-- Left Side of the edit -->
                <div class="container editLeft">
                    <div class="EditTitle inputBG">
                        <input type="text" class="form-control" placeholder="Add Title">
                    </div>
                    <div class="Location my-5">
                        <div class="cityCountryEdit gap-5 d-flex justify-content-between container my-3">
                            <div class="dropdown w-100">
                                <button class="dropdown-toggle countryButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Country
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <div class="inputBG country">
                                <div class="dropdown">
                                    <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        City
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
                        <div class="address mb-3 w-75 inputBG">
                            <input type="text" class="form-control" placeholder="Add Street Address">
                        </div>
                    </div>
                    <div class="editImage d-flex inputBG flex-column align-items-center">
                        <input class="form-control" type="file" id="event_image" name="event_image" placeholder="Add Image">
                    </div>
                    <div class="tags my-5 d-flex gap-3">
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
                        <label for="start_date" class="text-light">Start Date</label>
                        <input type="date" class="form-control mb-3" name="start_date" id="start_date">
                        <label for="end_date" class="text-light">End Date</label>
                        <input type="date" class="form-control mb-3" name="end_date" id="end_date">
                        <label for="start_time" class="text-light">Starting Time:</label>
                        <input type="time" class="form-control mb-3" name="start_time" id="start_time">
                    </div>
                        <br><br><br>
                    <div class="EditText inputBG">
                        <textarea name="event_desc" id="event_desc" cols="30" rows="10" placeholder="Event Bio"></textarea>
                    </div>
                </div>












            </div>

            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit" class="">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection