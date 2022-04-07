<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Books;

class CommentController extends Controller
{
    public function create(Books $book)
    {
        Comment::create([
            'body' =>request('body'),
            'books_id'=> $book->id,
            'user_id' =>Auth::id()
            
        ]);

        return back();
    }
}