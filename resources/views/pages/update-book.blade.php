@extends('main')
@section('content')
    <div class="container">
    <h2>Update Book</h2>
    @include('_partials/errors')
    <form action="/update/{{$book->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$book->name}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="vol" placeholder="Vol" value="{{$book->vol}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Price" value="{{$book->price}}">
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary" >Update</button>
    </form>
    </div>
@endsection