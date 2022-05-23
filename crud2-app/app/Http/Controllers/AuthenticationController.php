<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class AuthenticationController extends Controller
{
    public function registration(){
        return view('authenticate.registration');
    }
    public function registrationStore(Request $request){
        // validation
        $validated_request = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
            'email' => 'required|email:dns|unique:users'
        ]);

        User::create($validated_request);

        return redirect('/login')->with('registrationSuccess', 'You just registered');

    }

    public function login(){
        return view('authenticate.login');
    }
    public function loginStore(Request $request){
        // validation
        $credentials = $request->validate([
            'username'=>'required|min:5|max:255',
            'password'=>'required|min:5|max:255',
        ]); 

        // $user_username = User::where('username', $request['username'])->get();

        // try{
        //     $user_username = $user_username[0];
        // }catch(Exception $e){
        //     return back()->with('loginError', 'Your Login Failed!');
        // }

        $user_username = User::where('username', $request['username'])->get()->firstWhere('username', $request['username']);
        
        if ($user_username){
            $user_password = $user_username->password;
        }else{
            return back()->with('loginError', 'Your Login Failed!');
        }

        if ($user_password === $credentials['password']){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        
        // return back()->withErrors(''); -> tapi buat ke directive atau variable error

        return back()->with('loginError', 'Your Login Failed!');
    }
}
