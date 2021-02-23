<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use App\Author;
use App\BookAuthor;

class BookController extends Controller
{
    public function __construct(){
    	$this->middleware("auth");
    }

    public function add(){
    	if (Auth::check()) {
    		$user = User::find(Auth::user()->id);
    		$data = array(
    			"user" => $user,
                "author" => Author::get()
    		);
    		return view("book.create",compact("data"));
    	}else{
    		return redirect("logout");
    	}
    }

    public function store(Request $request){
    	$book = new Book;
    	$book->name = $request->nama_buku;
    	$book->tahun_terbit = $request->tahun;
    	$book->kode_buku = $request->kode_buku;
    	$book->created_at = date("Y-m-d H:i:s");
    	$book->created_by = Auth::user()->id;
        $book->save();

        foreach ($request->author as $key => $value) {
            $book_author = new BookAuthor;
            $book_author->book_id = $book->id;
            $book_author->author_id = $value;
            $book_author->created_at = date("Y-m-d H:i:s");
            $book_author->created_by = Auth::user()->id;
            $book_author->save();    
        }

    	return redirect("book/show/".$book->id);
    }

    public function show($id){
        if (Auth::check()) {
            $book = Book::find($id);
            $user = User::find(Auth::user()->id);
            $data = array(
                "user" => $user,
                "book" => $book,
                "author" => Author::get()
            );
            return view("book.show",compact("data"));
    	}else{
            return redirect("logout");
        }
    }

    public function update(Request $request){
        $book = Book::find($request->book_id);
        $book->name = $request->nama_buku;
        $book->tahun_terbit = $request->tahun;
        $book->kode_buku = $request->kode_buku;
        $book->created_at = date("Y-m-d H:i:s");
        $book->created_by = Auth::user()->id;
        $book->save();

        if ( $request->author){
           
            foreach ($request->author as $key => $value) {
                $book_author = new BookAuthor;
                $book_author->book_id = $book->id;
                $book_author->author_id = $value;
                $book_author->created_at = date("Y-m-d H:i:s");
                $book_author->created_by = Auth::user()->id;
                $book_author->save();    
            }
         
        }

        return redirect("book/show/".$book->id);
    }
}
