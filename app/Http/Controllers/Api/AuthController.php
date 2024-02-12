<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile'   => ['required', 'unique:users'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user =  User::create([
            'first_name'       => $request['first_name'],
            'last_name'       => $request['last_name'],
            'email'      => $request['email'],
            'mobile'     => $request['mobile'],
            'password'   => Hash::make($request['password']),
            'status'     => '0',
            'type'       => $request->type,
        ]);


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 200);

    }
    public function login(Request $request){
        $credentials = request(['email', 'password']);
        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token){
    
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 20,
            'user' => auth('api')->user()
        ]);
    }  

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'logout successfully']);
    }
}
