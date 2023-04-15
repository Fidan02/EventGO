@extends('layouts.eventgo')

@section('title', 'Messages')

@section('content')
    <div class="container d-flex justify-content-between gap-3">
        
        <!-- Friends inbox -->
        <div class="friends-message w-50 my-1">
            <div class="accepted friend my-2 d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h6>User Name</h6>
                    </div>
                    <div class="container friend-bio small">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti laboriosam iste illum qui nemo</p>
                    </div>
                </div>
            </div>
            <div class="not-selected friend d-flex">
                <div class="friend-img">
                    <a href="#" class="host-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <div class="friend-info">
                    <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                        <h6>User Name</h6>
                    </div>
                    <div class="container friend-bio small">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti laboriosam iste illum qui nemo</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chatbox -->
        <div class="chatroom w-100 my-1">
            <div class="container chatMessages">
                <div class="">
                    <div class="small senderMsg my-1">Some Texsdadasdadasdt Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem aspernatur molestiae porro officia minima quod cupiditate, eos veniam impedit sed adipisci, obcaecati dicta earum in, maxime officiis. Deserunt, non explicabo.</div>
                </div>
                <div class="">
                    <div class="small recieverMsg my-1">Some Texsdadasdadasdt</div>
                </div>
                <div class="">
                    <div class="small recieverMsg my-1">Some Texsdadasdadasdt</div>
                </div>
                <div class="">
                    <div class="small senderMsg my-1">Some Texsdadasdadasdt</div>
                </div>
            </div>
            <div class="sendMessage">
                <form action="" method="POST">
                    @csrf
                    <div class="d-flex messageInput">
                        <input type="text" class="w-75 form-control" placeholder="Message...">
                        <button type="submit" class="w-25">Send</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Messager Information -->
        <div class="messenger-profile w-50 my-1">
            <div class="container">
                <div class="friend-img my-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/avatar.png') }}" alt="Host Image" style="width: 80px; height: 80px;">
                    </a>
                </div>
                <div class="MessagerName text-light d-flex justify-content-center align-items-center">
                    <h3>User Name</h3>
                </div>
                <div>
                    <p class="text-light">Gallery:</p>
                    <div class="messagerGallery container">
                        <div class="card bg-dark text-white my-2" style="height: 200px;">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="d-flex justify-content-between mt-auto">
                                    <div class="d-flex align-items-center galleryUserName">
                                        <div class="galleryCaption d-flex align-items-end">
                                            <p>This is a caption</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white my-2" style="height: 200px;">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="d-flex justify-content-between mt-auto">
                                    <div class="d-flex align-items-center galleryUserName">
                                        <div class="galleryCaption d-flex align-items-end">
                                            <p>This is a caption</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white my-2" style="height: 200px;">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/017.webp" class="card-img" alt="Stony Beach"/>
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="d-flex justify-content-between mt-auto">
                                    <div class="d-flex align-items-center galleryUserName">
                                        <div class="galleryCaption d-flex align-items-end">
                                            <p>This is a caption</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection