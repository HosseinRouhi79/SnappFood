<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetCommentRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Trait\HttpResponse;

class CommentController extends Controller
{
    use HttpResponse;
    public array $foods;
    public function post(Request $request)
    {
        $cart = Order::where('user_id',Auth::id())->first();
//        dd($request->cart_id);
//        dd($cart->id);
        if($request->cart_id != $cart->id){
            return $this->error('','this is not your cart',403);
        }

        $comment = Comment::create([
           'author'=>Auth::user()->name,
           'order_id'=>$request->cart_id,
           'content'=>$request->message,
            'user_id'=>Auth::id(),
            'score'=>$request->score,
            'restaurant_id'=>$cart->restaurant_id

        ]);
        return $this->success($comment,'your comment added successfully');
    }

    public function getComments(GetCommentRequest $request)
    {
        Comment::all()
            ->each(function ($comment) use ($request){
             $comment->order->food()->where('id',$request->food_id)->get()
                 ->each(function ($food) use ($comment){
                     $this->foods[] = ['name'=>$food->name ,'comment'=>$comment->content, 'customer name'=>$comment->user->name];});
        });
        if(!isset($this->foods)){
            return $this->error('','No Comment For This Food',404);
        }
        return $this->foods;
    }
}
