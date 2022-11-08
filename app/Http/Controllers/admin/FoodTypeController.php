<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodAdminRequest;
use App\Models\FoodType;
use App\Models\RestaurantType;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $foods = FoodType::all();
       Gate::allows('isAdmin') ? Response::allow() : abort(403);
       return view('admin.foodCategory',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $restaurants = RestaurantType::all();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.createFoodCategory',compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FoodAdminRequest $request)
    {

        $now = Carbon::now()->format('d-m-Y');
        $imageName = $now.uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'),$imageName);
        $food = new \App\Models\FoodType();
        $food->name = $request->input('name');
        $food->discount = $request->input('discount');
        $food->restaurant_type_id = $request->input('restaurant_type_id');
        $food->image = $imageName;
        $food->save();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/foodType')->with('success','The food is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $food = \App\Models\FoodType::find($id);
        $restaurants = RestaurantType::all();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.editFoodCategory',compact('food','restaurants'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FoodAdminRequest $request, $id)
    {

        $now = Carbon::now()->format('d-m-Y');
        $imageName = $now.uniqid().'.'. $request->image->extension();
        $request->image->move(public_path('uploads'),$imageName);
        $food = \App\Models\FoodType::find($id);
        unlink(public_path("uploads/$food->image"));
        $food->name = $request->input('name');
        $food->discount = $request->input('discount');
        $food->restaurant_type_id = $request->input('restaurant_type_id_edit');
        $food->image = $imageName;
        $food->save();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/foodType')->with('success','The food is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $food = FoodType::find($id);
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        $food->delete();
        return redirect('/admin/foodType');
    }
}
