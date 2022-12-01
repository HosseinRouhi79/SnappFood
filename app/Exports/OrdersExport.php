<?php

namespace App\Exports;

use App\Enums\OrderStatus;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::where('status',OrderStatus::DONE)->get();
    }
}
