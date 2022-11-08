<?php

namespace App\Http\Controllers\customer;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Trait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    use Trait\HttpResponse;

    public function register(CustomerRegisterRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'role'=> UserType::Customer,
            'password'=> Hash::make($request->password)
        ]);

        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Api token of'.$user->name)->plainTextToken
        ]);
    }


    public function login(CustomerLoginRequest $request)
    {
        $request->validated($request->all());

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','Credential is not valid',401);
        }
        else {
            $user = User::where('email', $request->email)->first();
            return $this->success([
                'user'=>$user,
                'token'=>$user->createToken('Api token of '.$user->name)->plainTextToken
            ]);
        }
    }
}
