<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users',
        //     'password' => 'required|string|min:6'
        // ]);

        // $user = new User([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $user->save();
        // return response()->json(['message' => 'User has been registered'], 200);
        

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Personal Access Token REGISTERED')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], 200);
    }

    public function login(Request $request){
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required|string',
        // ]);

        // $credentials = request(['email', 'password']);

        // if(!Auth::attempt($credentials)){
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token_name;
        // $token->expires_at = Carbon::now()->addWeeks(1);
        // $token->save();

        // return response()->json(['data' => [
        //     'user' => Auth::user(),
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        // ]]);



        $credentials = request(['email', 'password']);
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $success['token'] = $user->createToken('Personal Access Token LOGINED')->accessToken;
            return response()->json(['success'=> $success], 200);
            
        }else{
            return response()->json(['error' => 'Error'], 401);
        }

    }

}
