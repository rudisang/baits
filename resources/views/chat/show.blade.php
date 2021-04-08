@extends('layouts.chat')

@section('messages')

@php $msgs = $messages->sortBy('created_at') @endphp
@foreach($msgs as $message)
@if($message->user->id == Auth::user()->id)
<div class="outgoing_msg">
        <div class="sent_msg">
                <p>{{$message->message}}</p>
          <span class="time_date">{{$message->created_at->diffForHumans()}}</span> </div>
      </div>
@else
<div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p>{{$message->message}}</p>
            <span class="time_date">{{$message->created_at->diffForHumans()}}</span></div>
        </div>
      </div>
@endif
@endforeach

@endsection

@section('form')
    <form action="/chat/send/{{$user->id}}" method="POST">
    @csrf
    <input name="message" class="write_msg" placeholder="Type a message" />
    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
</form>
    @endsection