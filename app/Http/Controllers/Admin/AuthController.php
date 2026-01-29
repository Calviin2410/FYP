<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
/* use App\Http\Requests\Auth\User\LoginRequest;
use App\Http\Requests\Auth\User\RegisterRequest; */
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
}
