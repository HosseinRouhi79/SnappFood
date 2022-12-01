<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerCommentController extends Controller
{
    public array $foods;
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',$user->id)->first();
        $comments = Comment::where('restaurant_id',$restaurant->id)->get();



        return view('seller/allComments',compact('user','comments'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $foodName = $request->input('search');
        $food = Food::where('name',$foodName)->first();
        $foodID = $food->id;
        $commentss = Comment::all();
        Comment::all()
            ->each(function ($comment) use ($foodID){
                $comment->order->food()->where('id',$foodID)->get()
                    ->each(function ($food) use ($comment){
                        $this->foods[] = ['name'=>$food->name ,'comment'=>$comment->content, 'customer name'=>$comment->user->name];});
            });
        if(!isset($this->foods)){
            return 'No Comment For This Food';
        }
        $foods = $this->foods;
        return view('seller.filterComments',compact('user','foods','commentss'));

    }
}
