<?php

namespace App\Http\Controllers\comment;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentStatusController extends Controller
{
    public function confirm($id)
    {
        $user = Auth::user();
        $order = Order::where('id',$id)->first();
        $id = $order->user_id;
        $address = Address::where([
            ['user_id','=',$id],
            ['is_active','=',1]
        ])->first();
        $comment = Comment::where('order_id',$order->id)->first();
        Gate::allows('isSeller') ? Response::allow() : abort(403);
        $comment->status = CommentStatus::CONFIRMED;
        $comment->save();
        return view('seller.customerDetail',compact('user','address','order','comment'));
    }

    public function toAdmin($id)
    {
        $user = Auth::user();
        $order = Order::where('id',$id)->first();
        $id = $order->user_id;
        $address = Address::where([
            ['user_id','=',$id],
            ['is_active','=',1]
        ])->first();
        $comment = Comment::where('order_id',$order->id)->first();
        Gate::allows('isSeller') ? Response::allow() : abort(403);
        $comment->status = CommentStatus::TO_ADMIN;
        $comment->save();
        return view('seller.customerDetail',compact('user','address','order','comment'));
    }
}
