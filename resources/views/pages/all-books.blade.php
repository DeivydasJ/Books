@extends('main')
@section('content')
<link href="{{asset('css/all-books.css')}}" rel="stylesheet" />
<div class="container-fluid">
<form action=""> 
                <div class="input-group">
            <input  type="text" name="byName" placeholder="Search by name" class="form-control"/>
                <select name="date" class="form-control">
                    <option value="" selected disabled>--Sort by registration date--</option>
                    <option value="asc">Oldest</option>
                    <option value="desc">Newest</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Search"/>
                </div>
            </form>
    <h1 class="all-books mt-4">Visos knygos</h1>
    <table class="table table-bordered table-responsive">
        @foreach($books as $book)
            <tr>
                    <th>
                            @if($book->picture)
                                <img src="{{asset('/storage/'.$book->picture)}}" alt="">
                            @endif
                        <div class="product-details">   
                            <div class="product-item-name">{{$book->name}}</div>
                            <div class="product-item-price">{{$book->price}} €</div>
                            <div class="product-item-vol">Vol. nr. {{$book->vol}}</div>
                            <a href="/book/{{$book->id}}">Placiau</a>
                        </div>
                    </th>
            </tr>
        @endforeach
    </table>
    {{$books->links()}}      
</div>
@endsection