<?php


namespace App\Http\Controllers;

use App\Services\JwtService;
use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $jwtService;
    protected $adminService;

    public function  __construct(JwtService $jwtService, AdminService $adminService)
    {
        $this->jwtService = $jwtService;
        $this->adminService = $adminService;
    }

    public function register(Request $request){
        $data= $request->only(['name','email','password']);
        try {
            $user = $this->adminService->register($data);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($user);
    }

    public function login(){
        $credentials = request(['email', 'password']);
        try{
            $token = $this->jwtService->login($credentials);
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }

        if(!$token){
            return response()->json(['error'=>'Unauthorized'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function logout(Request $request){
        try{
            $this->jwtService->logout();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function refresh(){
        try{
            $token = $this->jwtService->refresh();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }

        if(!$token){
            return response()->json(['error'=>'Unauthorized'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function data(){
        try{
            $data = $this->jwtService->data();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($data);
    }
}
