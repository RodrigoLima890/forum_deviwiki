<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $login)
    {
        $user = User::where('email', $login->email)->first();
        if(!$user || !Hash::check($login->password, $user->password)){
            throw ValidationException::withMessages([
                "email"=>["The credentials you entered are incorrect."]
            ]);
        }
    }
}
