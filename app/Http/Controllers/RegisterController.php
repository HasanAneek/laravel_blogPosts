<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes =request()->validate([
           'name' => ['required','min:4','max:255'],
           'username' => ['required','min:4','max:255',Rule::unique('users','username')],
           'email' => ['required','email',Rule::unique('users','email')],
           'password' => ['required','min:6','max:255']
        ]);
//        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Successfully created!');
    }
}
