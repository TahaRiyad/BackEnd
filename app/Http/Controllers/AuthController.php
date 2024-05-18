<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $user->token = $user->createToken(name: 'api_token')->plainTextToken;

        return $this->response(message: 'User created successfully.', data: new UserResource(resource: $user), status: 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check(value: $request->password, hashedValue: $user->password)) {
            return $this->response(message: 'The Email or Password is incorrect.', status: 401);
        }

        $user->token = $user->createToken(name: 'api_token')->plainTextToken;

        return $this->response(message: 'Welcome Back 😊!', data: new UserResource(resource: $user));
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->response(message: 'Logged out successfully.');
    }

    public function destroy(): ?JsonResponse
    {
        auth()->user()->delete();

        return $this->response(message: 'User deleted successfully.');
    }

    private function response(
        string $message,
        mixed  $data = null,
        int    $status = 200
    ): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }
}
