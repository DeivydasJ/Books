<?php
 use App\Models\Books;
?>
@extends('main')
@section('content')
<div class="container-fluid">
    <h2>Books</h2>

    <table class="table table-bordered table-responsive">
        <tr>
            <th>Name</th>
            <th>Vol</th>
            <th>Price</th>
            <th>Logo</th>
        </tr>
            @foreach($filtered as $book)
                <tr>
                    <th style="text-transform: capitalize">{{$book->name}}</th>
                    <th>{{$book->vol}}</th>
                    <th>{{$book->price}} €</th>
                    <th>
                    @if($book->picture)
                        <img style="width: 100px; height:100px;" src="{{asset('/storage/'.$book->picture)}}" alt="">
                    @endif
                    </th>
                    <th>
                        <ul>
                            <li><a href="/delete/book/{{$book->id}}">Delete</a></li>
                            <li><a href="/update/book/{{$book->id}}">Update</a></li>
                            <li><a href="/book/{{$book->id}}">More</a></li>
                        </ul>
                    </th>
                </tr>
            @endforeach
    </table>
    {{$filtered->links()}}      
</div>
@endsection