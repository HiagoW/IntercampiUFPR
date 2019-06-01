<?php
namespace App\Http\Controllers;
use App\User;
class RegistrationController extends Controller
{
    public function create(){
 		return view('registration.create');   	
    }
    public function store(){
    	
    	$this->validate(request(),[
    		'username' => 'required|',
    		'password' => 'required|confirmed|min:8',
        ]);
        if(User::where('username',request('username'))->count()>0){
    		return back()->withErrors([
    			'message'=>'Já cadastrado'
    		]);
    	}
    	$user = User::create([ 
            'username' => request('username'),
            'password' => bcrypt(request('password'))
        ]);
    	auth()->login($user);
    	return redirect('horarios');
    }
}