<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodType;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SellerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if (!Gate::allows('sellerComplete')) {
            abort(403);
        }

        return view('seller.sellerProfile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $user = Auth::user();
        $foods = FoodType::query()->where('restaurant_type_id', $user->restaurant->restaurant_type_id)->get();
        if (!Gate::allows('sellerComplete')) {
            abort(403);
        }
        return view('seller.sellerFood', compact('user', 'foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'food_type' => 'required',
            'image' => 'required|mimes:img,jpg,jpeg'
        ]);

        $user = Auth::user();

        $now = Carbon::now()->format('d-m-Y');
        $imageName = $now . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        $food = new Food();
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->restaurant_id = $user->restaurant->id;
        $food->recipe = $request->input('recipe');
        $food->discount = $request->input('discount');
        $food->food_type_id = $request->input('food_type');
        $food->image = $imageName;

        $food->save();
        return redirect('/seller/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $food = Food::find($id);
        $user = Auth::user();
        $foods = FoodType::query()->where('restaurant_type_id', $user->restaurant->restaurant_type_id)->get();
        if (!Gate::allows('sellerComplete')) {
            abort(403);
        }
        return view('seller.sellerFoodEdit', compact('user', 'foods', 'food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'food_type' => 'required',
        ]);
        $user = Auth::user();

        $now = Carbon::now()->format('d-m-Y');
        $imageName = $now . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $food = Food::find($id);
        unlink(public_path("uploads/$food->image"));
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->restaurant_id = $user->restaurant->id;
        $food->recipe = $request->input('recipe');
        $food->discount = $request->input('discount');
        $food->food_type_id = $request->input('food_type');
        $food->image = $imageName;

        $food->save();
        return redirect('/seller/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('/seller/profile');
    }
}
