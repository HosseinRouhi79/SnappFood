<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Response;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerResponseController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $order = Order::where('id',$id)->first();
        return view('seller.responseComment',compact('order','user'));
    }

    public function store($id,Request $request)
    {
        $user = Auth::id();
        $restaurant = Restaurant::where('user_id',$user)->first();
        $order = Order::where('id',$id)->first();
        $comment = Comment::where('order_id',$order->id)->first();
        $response = Response::create([
           'response'=>$request->input('response'),
            'restaurant_id'=>$restaurant->id,
            'comment_id'=>$comment->id,
        ]);
        $response->save();
        return 'response sent successfully';
    }
}
