<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware("auth");
    }

    public function index(){
    	if (Auth::check()) {
    		$user = User::find(Auth::user()->id);
            $data = array(
                "user" => $user,
                "book" => Book::get()
            );
            return view("admin.index",compact("data"));
    	}else{
    		return redirect("logout");
    	}
    }
}
