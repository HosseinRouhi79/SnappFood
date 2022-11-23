<?php

namespace App\Http\Controllers\seller;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Jobs\SendStatusJob;
use App\Jobs\StatusJob;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeStatusController extends Controller
{
    public function changeStatus($id)
    {
        $order = Order::where('id',$id)->first();
        $order->status = OrderStatus::PREPARING;
        $order->save();
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',Auth::id())->first();
        $orders = Order::where('restaurant_id',$restaurant->id)->get();


        //dispatch job
        dispatch(new StatusJob($order));


        return view('seller.sellerProfile',compact('user','orders'));

    }

    public function sendStatus($id)
    {
        $order = Order::where('id',$id)->first();
        $order->status = OrderStatus::SENDING;
        $order->save();
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',Auth::id())->first();
        $orders = Order::where('restaurant_id',$restaurant->id)->get();

        //dispatch job
        dispatch(new SendStatusJob($order));

        return view('seller.sellerProfile',compact('user','orders'));

    }
}
