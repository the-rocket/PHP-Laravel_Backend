<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;

class SessionsController extends Controller
{

	public function __construct() {
		$this->middleware('guest')->except(['destroy']);
	}
    public function create() {
    	return view('sessions.create');
    }

    public function store() {
        
        if (! Auth::attempt(request(['email', 'password']))) {
            $errors = ["password not matching", "invalid login"];
    		return back()->withErrors($errors);
    	}
    	return redirect()->home();
    }

    public function destroy() {
    	auth()->logout();
    	return redirect()->home();
    }
}
