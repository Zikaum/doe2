<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("register");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "password" => Hash::make($request->pass),
            "bloodtype" => $request->bloodType,
            "cep" => $request->cep,
            "state" => $request->state,
            "city" => $request->city,
            "age" => $request->age,
            "email" => $request->email
        ]);
        if(Auth::check()){
            return redirect("/personal_space");
        }else{
            return view("register");
        }
    }
}
