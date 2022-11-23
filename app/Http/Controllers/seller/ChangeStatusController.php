<?php

namespace App\Http\Controllers\seller;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Jobs\StatusJob;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeStatusController extends Controller
{
    public function changeStatus($id)
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',Auth::id())->first();
        $orders = Order::where('restaurant_id',$restaurant->id)->get();
        $order = Order::where('id',$id)->first();
        $order->status = OrderStatus::PREPARING;
        $order->save();

        //dispatch job
        dispatch(new StatusJob($order));


        return view('seller.sellerProfile',compact('user','orders'));

    }
}
