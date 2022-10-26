<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Mail\SendResetPassword;
use App\Models\Merchant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (!$token = auth()->guard('merchant-api')->attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 400);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('merchant-api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('merchant-api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('merchant-api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('merchant-api')->factory()->getTTL() * 60
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $user = Merchant::where('email', $request->input('email'))->first();
        $passwordBroker = app('auth.password')->broker('merchant');
        $tokens = $passwordBroker->getRepository();
        $token = $tokens->create($user);

        $body = [
            'name' => $user->_merchant_name,
            'url' => route('password.reset', ['token' => $token]),
        ];

        Mail::to($user->email)->send(new SendResetPassword($body));
        return response()->json(['message' => 'Mail sent successfully']);;
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]); 

        if ($validator->fails()) {
            return response()->json(['message' => 'validation error'], 500);
        }

        
        $password = $request->password;
        $user = DB::table('password_resets')->where('email', $request->email)->first();

        if (!Hash::check($request->token, $user->token)) return response()->json(['message' => 'token not found'], 500);

        $user = Merchant::where('email', $user->email)->first();

        if (!$user) return response()->json(['message' => 'Email not found'], 500);

        $user->password = Hash::make($password);
        $user->update();
        DB::table('password_resets')->where('email', $user->email)->delete();

        return response()->json(['message' => 'Password successfully changed'], 200);
    }
}
