<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Author;
use App\User;

class AuthorController extends Controller
{
    public function __construct(){
    	$this->middleware("auth");
    }

    public function index(){
    	if (Auth::check()) {
    		$user = User::find(Auth::user()->id);
    		$data = array(
                "user" => $user,
                "author" => Author::get()
            );
            return view("author.index",compact("data"));
    	}else{
    		return redirect("logout");
    	}
    }

    public function add(){
    	if (Auth::check()) {
    		$user = User::find(Auth::user()->id);
    		$data = array(
                "user" => $user,
                "author" => Author::get()
            );
            return view("author.create",compact("data"));
    	}else{
    		return redirect("logout");
    	}
    }

    public function store(Request $request){
    	$author = new Author;
    	$author->name = $request->nama_author;
    	$author->email = $request->email;
    	$author->created_at = date("Y-m-d H:i:s");
    	$author->created_by = Auth::user()->id;
    	$author->save();

    	return redirect("author/show/".$author->id);
    }

    public function show($id){
    	if (Auth::check()) {
    		$user = User::find(Auth::user()->id);
	    	$data = array(
	    		"author" => Author::find($id),
	    		"user" => $user
	    	);

	    	return view("author.show",compact("data"));
    	}else{
    		return redirect("logout");
    	}
    }

    public function update(Request $request){
    	$author = Author::find($request->author_id);
    	$author->name = $request->nama_author;
    	$author->email = $request->email;
    	$author->save();
    	return redirect("author/show/".$author->id);
    }
}
