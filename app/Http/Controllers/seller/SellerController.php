<?php

namespace App\Http\Controllers\seller;
session_start();

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function store(Request $request)
    {
//       $validator = $request->validate([
//           'email'=>'required'
//        ]);
//        return response()->json($validator->errors()->all());
        return response()->json([]);

//        dd($_POST['location']);
//
//        $restaurant = new Restaurant();
//        $restaurant->name = $request->input('name');
//        $restaurant->phone = $request->input('phone');
//        $restaurant->address = $request->input('address');
//        $restaurant->latlng = $_SESSION['myLocation'];
//        $restaurant->save();
    }
}
