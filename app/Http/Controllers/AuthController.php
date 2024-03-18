<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    /**
     * Registro de usuario
     */
    public function signUp(Request $request, $role = null)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        // Verifica que el rol proporcionado sea válido
        $validRoles = ['cliente', 'administrador']; // Agrega otros roles si es necesario
        $role = in_array($role, $validRoles) ? $role : 'cliente';

        // Imprime el valor del rol (agrega esta línea)
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role,
        ]);


        return response()->json([
            'message' => 'Successfully created user!',
        ], 201);
    }
    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
            'user_id' => $user->id ,
            'username' => $user->name,
            'email' => $user->email
            
        ]);
    }
  
    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function getUsers()
    {
        
        $users = User::all();

        
        return response()->json($users);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    /**
 * Actualizar información del usuario
 */
public function updateUser(Request $request)
{
    $request->validate([
        'name' => 'sometimes|string',
        'email' => 'sometimes|string|email|unique:users,email,' . $request->user()->id,
        'old_password' => 'required_with:password|string',
        'password' => 'sometimes|string|min:4|confirmed',
        'password_confirmation' => 'sometimes|string|min:4'
    ]);

    $user = $request->user();

    if ($request->has('name')) {
        $user->name = $request->name;
    }

    if ($request->has('email')) {
        $user->email = $request->email;
    }

    if ($request->has('password') && $request->has('old_password')) {

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old password is incorrect'], 400);
        }

        $user->password = bcrypt($request->password);
    }

    $user->save();

    return response()->json(['message' => 'User updated successfully']);
}

    
}   


