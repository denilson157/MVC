<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class APIController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request)
    {
        $token = null;
        
        $camposJson = json_decode($request->getContent(), JSON_OBJECT_AS_ARRAY);

        $credenciais = [
            'email' => $camposJson['email'],
            'password' => $camposJson['password'],
        ];

        try {
            if (!$token = JWTAuth::attempt($credenciais)) {
                return response()->json(['success' => false, 'message' => 'Credenciais incorretas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token não criado'], 500);
        }

        return response()->json(['success' => true, 'token' => $token]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Adeus'
                ]
            );
        } catch (JWTException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro, você ficará preso aqui para sempre'
                ],
                500
            );
        }
    }
}
