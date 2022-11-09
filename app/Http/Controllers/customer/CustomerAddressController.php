<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    public function getAllAddresses()
    {
        return AddressResource::collection(
            Address::where('user_id',Auth::id())->get()
        );
    }

    public function makeAddreses()
    {

    }
}
