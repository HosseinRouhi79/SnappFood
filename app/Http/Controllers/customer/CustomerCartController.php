<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCartController extends Controller
{
    use HttpResponse;
    public function store(Request $request)
    {
        static $cart = [];
        if (Auth::user()){

            $_SESSION['user_id'] = Auth::id();
            array_push($cart,$request->food_id);

        }


        return $this->success([$_SESSION['user_id'],$cart]);
    }
}
