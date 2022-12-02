<?php

namespace App\Http\Controllers\seller;

use App\Enums\OrderStatus;
use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public array $ordersFilter;
    public array $ordersFilter1;
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id',$user->id)->first();
        $orders = Order::where([['status','=',OrderStatus::DONE]
        ,['restaurant_id','=',$restaurant->id]])->get();

        return view('seller.sellerReport',compact('orders','user'));
    }

    public function export()
    {
        return Excel::download(new OrdersExport(), 'orders.xlsx');
    }

    public function filterDay(Request $request)
    {
        if($request->input('filterDay')=='1'){
            $user = Auth::user();
            $yestreday = Carbon::yesterday()->timestamp;
            $today = Carbon::today()->timestamp;

            $orders = Order::where('status',OrderStatus::DONE)->get();
            $orders->each(function ($order) use ($today,$yestreday){
               $time = Carbon::parse($order->created_at)->timestamp;
               if(($time<=$today)&&($time>=$yestreday)){
                $this->ordersFilter[] = $order;
               }
            });
            $orders = $this->ordersFilter;
            return view('seller.filterOrders',compact('orders','user'));
        }
        elseif($request->input('filterDay')=='2'){
            $user = Auth::user();
            $today = Carbon::today()->timestamp;
            $now = \Carbon\Carbon::now()->timestamp;

            $orders = Order::where('status',OrderStatus::DONE)->get();
            $orders->each(function ($order) use ($today,$now){
                $time = Carbon::parse($order->created_at)->timestamp;
                if(($time<=$now)&&($time>=$today)){
                    $this->ordersFilter1[] = $order;
                }
            });
            $orders = $this->ordersFilter1;
            return view('seller.filterOrders',compact('orders','user'));
        }


    }
}
