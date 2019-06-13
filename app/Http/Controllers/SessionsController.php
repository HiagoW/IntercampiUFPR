<?php
namespace App\Http\Controllers;
class SessionsController extends Controller
{
	public function __construct(){
		$this->middleware('guest', ['except'=>'destroy']);
	}
    public function create(){
		return view('sessions.create');    	
    }
    public function store(){
    	if(!(auth()->attempt(request(['username', 'password'])))){
    		return back()->withErrors([
    			'message'=>'Username ou senha incorretos.'
    		]);
    	}
    	return redirect('linhas');
    }
    public function destroy(){
    	auth()->logout();
    	return redirect('/');
    }
}