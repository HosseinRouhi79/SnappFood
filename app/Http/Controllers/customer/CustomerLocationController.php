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
        $restaurants = Restaurant::all();
        $restaurants->each(function ($restaurant) {
            $this->array[] = explode(',', $restaurant->latlng);
            foreach ($this->array as $items){
                foreach ($items as $item) {
                    $result = substr($item, 6);
                    $this->location[] = $result;
                }
            }
        });
        $finalLocation = array_unique($this->location);
        $finalLocation2 = array_map(function ($location) use ($finalLocation){
            if(array_search($location,$finalLocation)%2 == 0){
                return substr($location,1);
            }
                return substr($location,0,17);
            },$finalLocation);
        $finalLocationRests = array_chunk($finalLocation2,2);

        foreach ($finalLocationRests as $finalLocationRest){
            if(($lat-25 <= $finalLocationRest[0]) && ($finalLocationRest[0] <= $lat+5)){
               $this->bestRestaurant[] = $finalLocationRest;
            }
        }
            return $this->bestRestaurant;

//        return response()->json([
//            'location' => [
//                'lat' => $lat,
//                'lng' => $lng
//            ]]);
    }


}
