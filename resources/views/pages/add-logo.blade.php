@extends('main')
@section('content')
<link href="{{asset('css/add-logo.css')}}" rel="stylesheet" />
<div class="container">
    <h2>Add Logo</h2>
    <form action="/storelogo" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection