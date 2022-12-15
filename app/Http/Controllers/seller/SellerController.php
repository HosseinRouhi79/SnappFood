<?php

namespace App\Http\Controllers\seller;
session_start();

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{




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
        $data['start'] = $_POST['start'];
        $data['end'] = $_POST['end'];
//        var_dump(json_decode($_POST['location'])->lat);


//
        $restaurant = new Restaurant();
        $restaurant->name = $data['name'];
        $restaurant->phone = $data['phone'];
        $restaurant->address = $data['address'];
        $restaurant->restaurant_type_id = $data['restaurant_type'];
        $restaurant->lat = json_decode($data['location'])->lat;
        $restaurant->lng = json_decode($data['location'])->lng;
        $restaurant->start = $data['start'];
        $restaurant->end = $data['end'];
        $restaurant->user_id = Auth::id();
        $_SESSION['user_id'] = Auth::id();
        $restaurant->save();
    }

    public function setting($slug)
    {
        $user = Auth::user();
        $foods = DB::table('food')->where('restaurant_id',$slug)->get();
        return view('seller.showFoods',compact('foods','user'));
    }

    public function editProfile($id)
    {
        $restaurants = RestaurantType::all();
        $resaurant = Restaurant::find($id);
        if($id == Auth::user()->restaurant->id){
            return view('seller.sellerEditProfile',compact('restaurants','resaurant'));
        }
        return abort(403);
    }

    public function storeProfile(Request $request,$id)
    {
        $request->validate([
            'phone'=>'required',
            'address'=>'required',
        ]);


        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['restaurant_type'] = $_POST['restaurant_type'];
        $data['location'] = $_POST['location'];


//
        $restaurant = Restaurant::find($id);
        $restaurant->name = $data['name'];
        $restaurant->phone = $data['phone'];
        $restaurant->address = $data['address'];
        $restaurant->restaurant_type_id = $data['restaurant_type'];
        $restaurant->latlng = $data['location'];
        $restaurant->user_id = Auth::id();
        $_SESSION['user_id'] = Auth::id();
        $restaurant->save();
    }

}




