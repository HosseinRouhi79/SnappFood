<?php

namespace App\Http\Controllers\customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\OrderResource;
use App\Jobs\CustomerJob;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\TempFood;
use App\Trait\HttpResponse;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerCartController extends Controller
{
    use HttpResponse;
    public array $array = [];
    public array $array2 = [];

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
            array_push($this->array2,$item->count);
        });

        foreach (array_combine($this->array, $this->array2) as $foodId => $count) {
            $order->food()->attach($foodId, ['count' => $count]);
        }

        //Send Email After Submit The Cart To User
        $order2 = Order::where('user_id',Auth::id())->first();

        dispatch(new CustomerJob($order2));


        //Delete The Foods From Temp Table
        $deleteTempFoods = TempFood::where('user_id',Auth::id())->get();
        $deleteTempFoods->each(function ($item){
            $item->delete();
        });
        unset($this->array);

    }

    public function getCart()
    {
        $order = Order::where('user_id',Auth::id())->get();
        return $this->success($order->each(function ($item){
            return $item->food;
        }));
    }

    public function updateCart(CartRequest $request)
    {
        $request->validated($request->all());
        $tempFood = TempFood::where('food_id',$request->food_id)->where('user_id',Auth::id())->first();
        $tempFood->update($request->all());
        return $this->success($tempFood,'cart is updated successfully');
    }

    public function getAllCart()
    {
        return OrderResource::collection(
            Order::all()
        );


    }

    public function test()
    {
        dd(Order::first()->food);

    }
}
