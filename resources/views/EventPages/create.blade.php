@extends('layouts.eventgo')


@section('title', 'Create')


@section('content')
    <div class="container my-5">
        <h3 class="text-light">Create an Event</h3>
    </div>
    <div class="container my-5">
        @if (session('success'))
        <div class="alert alert-warning customAlert alert-dismissible fade show text-light border-0 my-5 m-5" role="alert">
            <strong>Update Successfull</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger errorAlert alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('home.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="editMain d-flex gap-3 justify-content-around container">
            <!-- Left Side of the edit -->
                <div class="container editLeft">
                    <div class="EditTitle inputBG">
                        <input type="text" class="form-control" name="title" placeholder="Add Title">
                    </div>
                    <div class="Location my-5">
                        <div class="cityCountryEdit gap-5 d-flex justify-content-between container my-3">
                            @if(Request::input('country') !== null)
                                <div class="dropdown w-100">
                                    @php 
                                        $country_id = Request::input('country');
                                    @endphp
                                    <button class="dropdown-toggle countryButton" type="button" name="country" data-bs-toggle="dropdown" aria-expanded="false">
                                        @foreach($country as $ct)
                                            @if($country_id == $ct->id)
                                                {{ $ct->country_name }}
                                            @endif
                                        @endforeach
                                    </button>
                                @if($country && count($country) > 0)
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach($country as $ct)
                                            <li><a class="dropdown-item" href="?country={{ $ct->id }}">{{ $ct->country_name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif 
                                </div>
                            @else
                                <div class="dropdown w-100">
                                <button class="dropdown-toggle countryButton" type="button" name="country" data-bs-toggle="dropdown" aria-expanded="false">
                                    Country
                                </button>
                                @if($country && count($country) > 0)
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach($country as $ct)
                                        <li><a class="dropdown-item" href="?country={{ $ct->id }}">{{ $ct->country_name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif 
                                </div>
                            @endif
                                
                            @if(Request::input('country') !== null)
                            <div class="inputBG country">
                                @if(Request::input('city') !== null)
                                <div class="dropdown">
                                        @php 
                                            $city_id = Request::input('city');
                                        @endphp
                                    <button class="inputBG dropdown-toggle cityButton" type="button" name="city" data-bs-toggle="dropdown" aria-expanded="false">
                                        @foreach($city as $ct)
                                            @if($city_id == $ct->id)
                                                {{ $ct->city_name }}
                                            @endif
                                        @endforeach
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                    @if($city && count($city) > 0)
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            @foreach($city as $ci)
                                                @if($country_id == $ci->country_id)
                                                    <li><a class="dropdown-item" href="?country={{ $ci->country_id }}&city={{ $ci->id }}">{{ $ci->city_name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif 
                                    </ul>
                                </div>
                                @else
                                <div class="dropdown">
                                    <button class="inputBG dropdown-toggle cityButton" name="city" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        City
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                    @if($city && count($city) > 0)
                                            @foreach($city as $ci)
                                                @if($country_id == $ci->country_id)
                                                    <li><a class="dropdown-item" href="?country={{ $ci->country_id }}&city={{ $ci->id }}">{{ $ci->city_name }}</a></li>
                                                @endif
                                            @endforeach
                                    @endif 
                                    </ul>
                                </div>
                                @endif
                            </div>
                            @else
                            <div class="inputBG country">
                                <div class="dropdown">
                                    <button class="inputBG dropdown-toggle cityButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        City
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="#">Select a Country First!</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>


                        <div class="address mb-3 w-75 inputBG">
                            <input type="text" class="form-control" name="address" placeholder="Add Street Address">
                        </div>
                    </div>
                    <div class="editImage d-flex inputBG flex-column align-items-center">
                        <input class="form-control" type="file" id="image" name="image" placeholder="Add Image">
                    </div>
                    <div class="tags my-5">
                        <h6 class="text-light" >Tags:</h6>
                        @if($tags)
                        <div class="container tag-container d-flex row">
                            @foreach($tags as $tag)
                            <p class="d-inline-block col-4">
                                <input type="checkbox" name="tags[]" class="tag-checkbox" value="{{ $tag->id }}" id="{{ $tag->tag_name }}" />
                                <label class="text-light" for="{{$tag->tag_name}}">{{$tag->tag_name}}</label>
                            </p>
                            @endforeach
                        </div>
                        @endif
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
                        <textarea name="event_desc" id="event_desc" cols="30" rows="10" class="p-1" style="resize: none;" placeholder="Event Bio"></textarea>
                    </div>
                </div>

            </div>

            <input type="hidden" name="country_id" @if(isset($country_id)) value="{{ $country_id }}" @endif />
            <input type="hidden" name="city_id" @if(isset($city_id)) value="{{ $city_id }}" @endif />

            <div class="container EditBTN d-flex justify-content-center my-5">
                <button type="submit" class="">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    let checked = document.querySelectorAll('input.tag-checkbox');
    let tags = 0;

    checked.forEach(tag => {
        tag.addEventListener('change', function() {
        if (this.checked) {
            tags++;
        } else {
            tags--;
        }

        if (tags > 3) {
            this.checked = false;
            tags--;
            alert('Maximum 3 tags Is allowed');
        }
        });
    });
    });
</script>
@endsection