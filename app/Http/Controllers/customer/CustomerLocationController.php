<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLocationController extends Controller
{
    public array $location;
    public array $array;
    public array $bestRestaurant;


    public function find()
    {

        $user = Auth::user();
        $address = Address::where([['user_id', $user->id], ['is_active', '=', 1]])->first();
        $lat = $address->latitude;
        $lng = $address->longitude;
        $restaurants = Restaurant::whereBetween('lat',[$lat-30,$lat-10])->whereBetween('lng',[$lng-5,$lng+5])->get();
        return $restaurants;


    }
}
