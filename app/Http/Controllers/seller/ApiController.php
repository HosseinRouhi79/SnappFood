<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\DaysResource;
use App\Http\Resources\FoodResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use HttpResponse;
    public function getRestaurantInfo($id)
    {
        return DaysResource::collection(
            Restaurant::where('id',$id)->get()
        );
    }

    public function getAllRestaurants()
    {
        return RestaurantResource::collection(
         Restaurant::all()
        );
    }

    public function getFoodsOfRestaurant($id)
    {
       return FoodResource::collection(
         Restaurant::where('id',$id)->get()
        );
    }

}
