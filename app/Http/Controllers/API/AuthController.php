<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

/**
* @OA\Post(
 *     path="/api/login",
 *     summary="User Login",
 *     tags={"Auth"},
 *     operationId="signin",
 *     description="Login dengan user account untuk mendapatkan auth token agar aplikasi tetap terhubung gunakan token pada header ",
 * @OA\RequestBody(
 *        description="Dibutuhkan login untuk memulai session aplikasi",
 *        required=true,
 *        @OA\MediaType(
 *             mediaType="application/json",
 *              @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="email",
 *                     description="User email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     description="User password",
 *                     type="string"
 *                 ),
 *             )
 *          )
 *     ),    
*  @OA\Response(
*     response=200,
*     description="ok",
*     @OA\JsonContent(
*        type="object",
*        @OA\Property(property="success", type="boolean"),
*        @OA\Property(property="data", type="object", example={
*                                                       "token": "13|Y7jXDOh4dAnAEreE0QcP4BGnWPjgTftkXOaON9ct",
*                                                       "name":"Admin"
*         }),
*        @OA\Property(property="message", type="string", example="User signed in")
*     )
*   ),
*   @OA\Response(response="401",description="Unauthorized"),
* )
*/  
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

/**
* @OA\Post(
*     security={{"apiAuth":{}}},
*     path="/api/logout",
*     summary="User Login",
*     tags={"Auth"},
*     operationId="logout",
*  @OA\Response(
*     response=200,
*     description="Sukses logout",
*     @OA\JsonContent(
*        type="object",
*        @OA\Property(property="success", type="string")
*     )
*   ),
*   @OA\Response(response="401",description="Unauthorized"),
* )
*/  
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

}
