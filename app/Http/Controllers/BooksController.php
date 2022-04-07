<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class BooksController extends Controller
{
    public function index(Request $request){
      $filterNames = Books::pluck('name')->toArray();
      $filterName = $request->input('bookName');
      if($filterName!=""){
          $books = Books::where(function ($query) use ($filterName){
              $query->where('name', 'like' ,'%'.$filterName.'%');
          })->simplePaginate(8);
          $books->appends(['bookName' => $filterName]);
      }
      else{
          $books = Books::simplePaginate(8);
      }
        return view('pages.home', compact('filterName'))->with('filtered', $books);
    }

    public function addBook(){
        $categories = Category::all();
        return view('pages.add-book', compact('categories'));
    }

    public function storeBook(Request $request){
        if(request()->hasFile('picture')){
            $path = $request->file('picture')->store('public/images');
            $fileName = str_replace('public/', '', $path);
        }
        Books::create([
            'name'=>request('name'),
            'vol'=>request('vol'),
            'price'=>request('price'),
            'picture'=>$fileName,
            'category_id' =>request('category'),
            'user_id'=>Auth::id(),
        ]);
        return redirect('/');
    }

    public function deleteBook(Books $book){
        if(Gate::denies('delete-book', $book)){
            dd('you have no access');
        }
        $book->delete();
        return redirect('/');
    }

    public function updateBook(Books $book){
        $categories = Category::all();
        return view('pages.update-book', compact('book', 'categories'));
    }

    public function storeUpdate(Books $book, Request $request){
        if($book->picture){
            File::delete(storage_path('app/public/'.$book->picture));
        }
        if(request()->hasFile('picture')){
            $path = $request->file('picture')->store('public/images');
            $fileName = str_replace('public/','',$path);
            Books::where('id',$book->id)->update(['picture'=>$fileName]);
        }
        Books::where('id', $book->id)->update($request->only(['name', 'vol', 'price',]));
        return redirect('/');
    }

    public function showBook(Books $book){
        return view('pages.show-book', compact('book'));
    }

    public function allBooks(Request $request){
        $filterNames = Books::pluck('name')->toArray();
        $search = $request->input('byName');
        if($search!="" || $request->name || $request->date){
            $name = Books::where(function ($query) use ($search){
                $query->where('name', 'like' ,'%'.$search.'%');
        })->when($request->date, function($query, $date){
            return $query->orderBy('created_at', $date);
        })->paginate(8);
        $name->appends(['byName' => $search]);
    }
        else{
            $name = Books::simplePaginate(8);
        }
          return view('pages.all-books')->with('books', $name);
      }

    
}
