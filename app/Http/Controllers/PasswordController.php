<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function updatePassword(Request $request): ?JsonResponse
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        auth()->user()?->update(['password' => $request->password]);

        return $this->response(message: 'Password updated successfully.');
    }

    public function forgotPassword(Request $request): ?JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $request->get('email'))->first();

        $code = random_int(1000, 9999);

        $user->update(['code' => $code]);

        return $this->response(
            message: 'Password reset link sent successfully.',
            data: ['code' => $code]
        );
    }

    public function resetPassword(Request $request): ?JsonResponse
    {
        $request->validate([
            'code' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('code', $request->get('code'))->first();

        if (!$user) {
            return $this->response(message: 'Invalid code.', status: 400);
        }

        $user->update(['password' => $request->password]);

        return $this->response(message: 'Password reset successfully.');
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
