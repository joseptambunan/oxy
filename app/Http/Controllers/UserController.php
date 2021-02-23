<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserGroup;
use App\Helpers\Oxy;
use App\Jobs\Reset;

class UserController extends Controller
{
    public function index(Request $request){
    	if (Auth::check()) {
    		return redirect("admin");
    	}else{
    		return view("user.login");
    	}
    }

    public function login(Request $request){
    	$credential = $request->only("email","password");
    
        if ( Auth::attempt($credential)){
        	return redirect("admin");
        }else{
        	$failed_login = true;
        	return view("user.login",compact("failed_login"));
        }

    }

    public function reset(Request $request){
        $email = $request->email;
        $user = User::where("email",$email)->get();
        $password = Oxy::default_password();
        if ( count($user) > 0 ){
            $data_user = User::find($user->first()->id);
            $data_user->password = crypt($password,'$6$rounds=5000$saltatkas$'); 
            $data_user->save();
        }
        $user_ = User::find($user->first()->id);
        Reset::dispatch($user_,$password);
        return redirect("/");
    }

    public function logout(){
    	Auth::logout();
        return redirect("/");
    }

    public function forgot(){
        return view("user.reset");
    }
}
