<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

=======
use Illuminate\Http\JsonResponse;
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
=======
    public function login(Request $request): JsonResponse {
    	$validator = Validator::make($request->all(), [
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    public function register(Request $request)
    {
=======
    public function register(Request $request): JsonResponse {
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    public function logout()
    {
=======
    public function logout(): JsonResponse {
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    public function refresh()
    {
=======
    public function refresh(): JsonResponse {
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    public function userProfile()
    {
=======
    public function userProfile(): JsonResponse {
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
<<<<<<< HEAD
    protected function createNewToken($token)
    {
=======
    protected function createNewToken($token): JsonResponse {
>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
<<<<<<< HEAD
=======

>>>>>>> b38582115a35bf7d090f895f053c587c359573fc
}
