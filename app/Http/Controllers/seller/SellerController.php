<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller.sellerProfile');
    }


    public function store(Request $request)
    {
        $request->validate([
           'phone'=>'required|unique:restaurants',
           'address'=>'required',
        ]);

        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['restaurant_type'] = $_POST['restaurant_type'];
        $data['location'] = $_POST['location'];


//
        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->phone = $data['phone'];
        $restaurant->address = $data['address'];
        $restaurant->restaurant_type_id = $data['restaurant_type'];
        $restaurant->latlng = $data['location'];
        $restaurant->user_id = Auth::id();
        $restaurant->save();
    }
}



//       $request->validate([
//           'name'=>'required',
//           'phone'=>'required',
//           'address'=>'required',
//        ]);
//        return $request->errors()->all();
//        return response()->json([]);
