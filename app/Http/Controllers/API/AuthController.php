<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        return $this->sendResponse([], 'User register successful');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();

            if ($user->status == 0) {
                return $this->sendError('Your account has been deactivated.');
            }

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->sendResponse([], 'Logged out successfully.');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return $this->sendResponse([], 'Password reset link sent successfully.');
        } else {
            return $this->sendError('Unable to send reset link.', ['error' => __($status)]);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return $this->sendResponse([], 'Password has been reset successfully.');
        } else {
            return $this->sendError('Unable to reset password.', ['error' => __($status)]);
        }
    }
}
