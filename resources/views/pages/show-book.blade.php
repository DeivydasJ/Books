@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="card" style="display:flex; align-items: center; width: 35rem;">
            <div class="card-body" >
                <h2 class="card-title" style="color: darkblue; text-transform: capitalize">Book Title: <p>{{$book->name}}</p></h2>
                <div style="color: lightblue">
                    <p class="card-text">Vol: {{$book->vol}}</p>
                    <p class="card-text">Price: {{$book->price}} €</p>
                    <p class="card-text">Category: {{$book->category->category}}</p>
                    <img style="width: 30rem" src="{{ asset('/storage/'.$book->picture) }}" alt="">
                </div>
            </div>
        </div>
        <form action="/book/{{$book->id}}/comment" method="post">
            @csrf
            <div class="form-group" style="width: 30em;">
                <textarea name="body" class="form-control" placeholder="Jusu komentaras"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Comment</button>
            </div>
        </form>

        <div>
            <h3>All Comments</h3>
            @if(count($book->comment))
                @foreach($book->comment as $comment)
                    <div>
                        <div><b>{{$comment->user->name}}</b>:</div>
                        <div>{{$comment->body}}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection