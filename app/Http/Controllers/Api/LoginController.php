<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    #Metodo para procesar los datos enviados por un formulario
    public function store(Request $request)
    {
        #Validamos los datos requeridos
        $request->validate([
            'email'       => 'required|email',
            'password'    => 'required',
            'device_name' => 'required'
        ]);

        #Comprobamos si el usuario existe en la db
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The credentials are incorrect'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        #Retornamos la informacion del usuario junto con su token
        return response()->json([
            'data' => [
                'attributes' => [
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email' => $user->email,
                ],
                'token'    => $user->createToken($request->device_name)->plainTextToken
            ]
        ], Response::HTTP_OK);
    }
}
