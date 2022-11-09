<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use HttpResponse;
    public function getRestaurantInfo($id)
    {
        return RestaurantResource::collection(
            Restaurant::where('id',$id)->get()
        );
    }
}
