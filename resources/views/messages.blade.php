@extends('layouts.eventgo')

@section('title', 'Messages')

@section('content')
    <div class="container d-flex justify-content-between gap-3">
        <!-- Friends inbox -->
        <div class="friends-message w-50 my-1">
            <!-- New Chat -->
            <div class="container my-3 text-center">
                <button type="button" class="newChatBtn" data-bs-toggle="modal" data-bs-target="#newMessageModal">
                    New Chat!
                </button>
            </div>
            @if($users && count($users) > 0)
                @foreach($users as $user)
                    <div class="@if(Request::input('sender') == $user->id) accepted @else not-selected @endif friend my-2 d-flex">
                        <div class="friend-img">
                            <a href="?sender={{ $user->id }}" class="host-image d-flex justify-content-center align-items-center">
                                <img src="{{ asset('storage/avatars/'. $user->image) }}" alt="Host Image" class="rounded-circle object-fit-cover" style="width: 60px; height: 60px;">
                            </a>
                        </div>
                        <div class="friend-info">
                            <div class="container friend-name d-flex justify-content-between mt-1 text-light">
                                <h6>{{ $user->name }}</h6>
                            </div>
                            <div class="container friend-bio small">
                                @if(!is_null($user->bio))
                                    <p>{{ $user->bio }}</p>
                                @else
                                    <p>It's really quiet...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="container my-3 text-center">
                <p class="container text-light text-decoration-none newChatBtn">
                    0 Conversations!
                </p>
            </div>
            @endif
        </div>

        <!-- Chatbox -->
        <div class="chatroom w-100 my-1">
    @if(Request::input('sender') !== null)
        @php 
            $sender_id = Request::input('sender');
            $_messages = App\Models\Message::where(function($query) use ($sender_id){
                $query->where('sender_id', $sender_id)
                    ->where('reciever_id', auth()->id());
            })->orWhere(function($query) use ($sender_id){
                $query->where('sender_id', auth()->id())
                    ->where('reciever_id', $sender_id);
            })->orderBy('created_at', 'asc')->get();

            $msgs = [];

                foreach($_messages as $message){
                    if( 
                        (($message->sender_id == $sender_id) and ($message->reciever_id == auth()->id())) 
                        or
                        (($message->sender_id == auth()->id()) and ($message->reciever_id == $sender_id) )
                    ){
                        $msgs[] = $message;
                    }
                }
        @endphp
        <div class="container chatMessages">
            @foreach($msgs as $msg)
                @if($msg->reciever_id == auth()->id())
                    <div>
                        <div class="small senderMsg my-1">
                            {{ $msg->message }}
                        </div>
                    </div>
                @else
                    <div>
                        <div class="small recieverMsg my-1">
                            {{ $msg->message }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="sendMessage">
            <form id="sendMessageForm" action="{{ route('sendMessage') }}" method="POST">
                @csrf
                <div class="d-flex messageInput">
                    <input type="hidden" name="sender_id" value="{{ Request::input('sender') }}">
                    <input type="text" class="w-75 form-control" name="message" placeholder="Message...">
                    <button type="submit" class="w-25">Send</button>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Set interval to periodically check for new messages
                setInterval(function() {
                    var lastMessageId = $('.chatMessages .senderMsg:last').attr('data-id');
                    var senderId = $('input[name="sender_id"]').val();
                    var fileData = new FormData();
                    fileData.append("sender_id", senderId);
                    fileData.append("lastMessageId", lassMessageId);
                    $.ajax({
                        url: '/chat',
                        type: 'POST',
                        data: fileData,
                        success: function(response) {
                            // Append new messages to the chat
                            $('.chatMessages').append(response);
                        }
                    });
                }, 1000); // 5 seconds interval
            });
        </script>
    @endif
</div>

        <!-- Messager Information -->
        <div class="messenger-profile w-50 my-1">
        @if($messagers && count($messagers) > 0)
            @foreach($messagers as $user)
            @if(Request::input('sender') == $user->id)
            <div class="container">
                <div class="friend-img my-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/avatars/'. $user->image) }}" alt="$user->name" class="rounded-circle object-fit-cover" style="width: 80px; height: 80px;">
                    </a>
                </div>
                <div class="MessagerName text-light d-flex justify-content-center align-items-center">
                    <h3>{{ $user->name }}</h3>
                </div>
                <div>
                    <p class="text-light">Gallery:</p>
                    @foreach($user->galleries as $gl)
                    <div class="messagerGallery container">
                        <div class="card bg-dark text-white my-2" style="height: 200px;">
                            <img src="{{ asset('storage/gallery/'. $gl->image)}}" class="card-img object-fit-cover" alt="Stony Beach"/>
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="d-flex justify-content-between mt-auto">
                                <div class="d-flex justify-content-between mt-auto">
                                    <div class="galleryUserName galleryCaption p-1">
                                        <h6 class="small">{{ $gl->caption }} </h6>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        @endif
        </div>
    </div>







<!-- New Message Modal! -->

    <div class="modal fade" id="newMessageModal" tabindex="-1" aria-labelledby="newMessageModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="exampleModalLabel">New message</h5>
            </div>
            <form action="{{ route('sendMessage')}}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div class="mb-3 form-group">
                            <select name="reciever_id" id="reciever_id" class="form-control">
                                <option value="">Select Friend</option>
                                @if(count($friends))
                                    @foreach($friends as $friend)
                                        @if($friend->friend_id == auth()->id())
                                            <option value="{{ App\Models\User::find($friend->user_id)->id }}">{{ App\Models\User::find($friend->user_id)->name }}</option>
                                        @else
                                            <option value="{{ App\Models\User::find($friend->friend_id)->id }}">{{ App\Models\User::find($friend->friend_id)->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="message"></textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="newChatBtn">Send message</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection