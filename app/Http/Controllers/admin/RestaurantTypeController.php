<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class RestaurantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $restaurants = \App\Models\RestaurantType::all();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.restaurantCategory',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.createRestCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $restaurant = new \App\Models\RestaurantType();
        $restaurant->name = $request->input('name');
        $restaurant->save();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/restaurantType');

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
        $restaurant = \App\Models\RestaurantType::find($id);
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.editRestCategory',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $restaurant = \App\Models\RestaurantType::find($id);
        $restaurant->name = $request->input('name');
        $restaurant->save();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/restaurantType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $restaurant = \App\Models\RestaurantType::find($id);
        $restaurant->delete();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/restaurantType');

    }
}
