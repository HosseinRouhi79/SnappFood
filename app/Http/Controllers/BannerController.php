<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $user = Auth::user();
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.banner',compact('banners','user'));
    }

    public function create()
    {
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return view('admin.bannerCreate');
    }

    public function store(BannerRequest $request)
    {

        $now = Carbon::now()->format('d-m-Y');
        $imageName = $now.uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'),$imageName);
        Banner::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageName,
        ]);
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return redirect('/admin/banners');
    }

}
