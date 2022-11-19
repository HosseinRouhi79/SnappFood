<?php

namespace App\Http\Controllers\customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\TempFood;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerCartController extends Controller
{
    use HttpResponse;
    public array $array = [];

    public function store(CartRequest $request)
    {
        $tempCart = TempFood::create([

            'user_id'=>Auth::id(),
            'food_id'=>$request->food_id,
            'count'=>$request->count,
        ]);
        $tempCart->save();
        return $this->success($tempCart,'added to temp cart');
    }

    public function submit()
    {
        $restaurant = TempFood::where('user_id',Auth::id())->first();
        $foodId = $restaurant->food_id;
        $food = Food::where('id',$foodId)->first();
        $restaurantId = $food->restaurant_id;
        $selectedRestaurant = Restaurant::where('id',$restaurantId)->first();
        $name = $selectedRestaurant->name;

        $order = Order::create([
            'user_id'=>Auth::id(),
            'restaurant_id'=>$restaurantId,
            'status'=>OrderStatus::ACTIVE
        ]);
        $tempFoods = TempFood::where('user_id',$order->user_id)->get();
        $tempFoods->each(function ($item){
            array_push($this->array,$item->food_id);
        });

        $order->food()->attach($this->array);
    }
}
