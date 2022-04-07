@extends('main')
@section('content')
<link href="{{asset('css/add-book.css')}}" rel="stylesheet" />
<div class="container">
    <h2>Add book</h2>

    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="vol" placeholder="Vol." >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Price" >
        </div>
        <div class="form-group">
                <label>Picture</label>
                <input type="file" name="picture" class="form-control" >
        </div>
        <select name="category" class="form-select">
            <option value="" selected>--Select category--</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection