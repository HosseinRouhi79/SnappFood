<?php

namespace App\Http\Controllers;

use App\Models\RestaurantType;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FirstPageController extends Controller
{
    public function index()
    {
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.index');
    }

    public function sellerForm()
    {
        $restaurants = RestaurantType::all();
        Gate::allows('isSeller') ? Response::allow() : abort(403);
        return view('seller.form',compact('restaurants'));
    }
}
