<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerUpdateController extends Controller
{
    use HttpResponse;
    public function updatePersonal(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return $this->success($user,'user is updated successfully');
    }
}
