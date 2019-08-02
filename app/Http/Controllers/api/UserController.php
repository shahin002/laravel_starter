<?php

namespace App\Http\Controllers\api;

use App\Http\Traits\ApiStatus;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiStatus;
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return $this->failureResponse($response);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $user = Auth::user();
            $response['token'] = 'Bearer '.$user->createToken('Secret123456')->accessToken;
            $response['message'] = "Login Successfull";
            return $this->successResponse($response);
        } else {
            $response['message'] = "Credentials do not match";
            return $this->failureResponse($response);
        }
    }

    /*Register function*/
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return $this->failureResponse($response);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if ($request->hasFile('image')) {
            $input['image']=$this->imageSave($request->image,'user');
        }
        $user = User::create($input);
        $response['token'] = 'Bearer '.$user->createToken('To-let')->accessToken;
        $response['user_id'] = $user->id;
        return $this->successResponse($response);
    }


    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            $response['message'] = "Logout succesfull";
            return $this->successResponse($response);
        }
    }

    public function userDetails()
    {
        $user = Auth::user();
        if ($user) {
            $response['user'] = $user;
            $response['message'] = "User Information";
            return $this->successResponse($response);
        } else {
            $response['message'] = "No user found";
            return $this->failureResponse($response);

        }

    }

    public function userDetailsById($id){
        $user = User::where('id',$id)->first();

        if ($user) {
            $response['user'] = $user;
            $response['message'] = "User Information";
            return $this->successResponse($response);
        } else {
            $response['message'] = "No user found";
            return $this->failureResponse($response);

        }
    }
}
