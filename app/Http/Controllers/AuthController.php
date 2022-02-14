<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Check if field is empty
        if (empty($email) or empty($password)) {
            return response()->json(['status' => 'errr', 'message' => 'You must fill all the fields']);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

     protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        // $name = $request->name;
        $email = $request->email;
        $user_type = $request->user_type;
        $registration_id = $request->registration_id;

        // Check if field is empty
        if (empty($email) or empty($registration_id)) {
            return response()->json(['status' => '204', 'message' => 'You must fill all the fields']);
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status' => '206', 'message' => 'You must enter a valid email']);
        }

       

        // Check if user already exist
        if (User::where('email', '=', $email)->exists()) {
            return response()->json(['status' => 'error', 'message' => 'User already exists with this email']);
        }

        if($user_type == "student"){
            if (User::where('matric_no', '=', $registration_id)->exists()) {
                return response()->json(['status' => 'error', 'message' => 'User already exists with this Matric No']);
            }
        }elseif($user_type  == "staff"){
            if (User::where('staff_id', '=', $registration_id)->exists()) {
                return response()->json(['status' => 'error', 'message' => 'User already exists with this Staff ID']);
            }
        }
       

        // Create new user
        try {
            $user = new User();
            // $user->name = $request->name;
            $user->email = $request->email;
            $user->password = app('hash')->make($request->registration_id);

            if($user_type == "student"){

                $user->matric_no = $request->registration_id;

            }elseif($user_type  == "staff"){

                $user->staff_id = $request->registration_id;

            }
           

            if ($user->save()) {
                //adding value to a reuest object
                $reg = ['password' => $registration_id];
                $request->merge($reg);
                
                return $this->login($request);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getCategory(Request $request)
    {
        $categories = Category::all();
        return response()->json(['status'=>'200', 'message'=> $categories]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function whoLoggedIn()
    {

    }


}
