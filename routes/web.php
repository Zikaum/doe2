<?php

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ["posts" => Post::all()]);
});


Route::get("/requirements", function(){
    return view("requirements");
});

Route::group(["middleware" => "guest"], function(){
    Route::get('/login', function () {
        return view('login');
    })->name("login");
    
    Route::post('/login', function (LoginRequest $request) {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        if(Auth::check()){
            return redirect()->intended("/");
        }else{
            return view('login');
        }
    });
    
    Route::get("/register", function(){
        return view("register");
    });
    Route::post("/register", function(Request $request){
        User::create([
            "name" => $request->name,
            "password" => Hash::make($request->pass),
            "blood_type" => $request->bloodType,
            "cep" => $request->cep,
            "state" => $request->state,
            "city" => $request->city,
            "age" => $request->age,
            "email" => $request->email
        ]);
        return view("register");
    });
});

Route::group(["middleware" => "auth"], function(){
    Route::get("/personal_space", function(){
        return redirect("/personal_space/my_donations");
    });
    Route::get("/personal_space/my_donations", function(){
        return view("personal_space", ["optionSelected" => 0]);
    });
    Route::get("/personal_space/my_requests", function(){
        return view("personal_space", ["optionSelected" => 1, "myPosts" => Post::where('user_id', Auth::user()->id)->get()]);
    });
    Route::get("/personal_space/make_request", function(){
        return view("personal_space", ["optionSelected" => 2]);
    });
    Route::post("/personal_space/make_request", function(Request $request){
        Post::create([
            'place' => $request->place,
            'amount' => $request->amount,
            'reason' => $request->reason,
            'user_id' => Auth::user()->id
        ]);
        return view("personal_space", ["optionSelected" => 2]);
    });
});
