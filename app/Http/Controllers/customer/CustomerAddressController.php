<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    use HttpResponse;
    public function getAllAddresses()
    {
        return AddressResource::collection(
            Address::where('user_id',Auth::id())->get()
        );
    }

    public function makeAddresses(AddressRequest $request)
    {
        $request->validated($request->all());
        $address = Address::create([
            'title'=> $request->title,
            'address'=> $request->address,
            'longitude'=> $request->longitude,
            'latitude'=> $request->latitude,
            'user_id'=>Auth::id()
        ]);
        return $this->success($address,'your address is added successfully');
    }

    public function setActive($id)
    {

        $address = Address::where('id',$id)->first();

        if(Auth::id() !== $address->user_id){
            return $this->error('','unauthorized action',401);
        }

        $addresses = Address::where('user_id',Auth::id())->get();
        foreach ($addresses as $item) {
            $item->is_active = 0;
            $item->save();
        }

        $address->is_active = 1;
        $address->save();
        return $this->success($address,'current address updated successfully');
    }

}
