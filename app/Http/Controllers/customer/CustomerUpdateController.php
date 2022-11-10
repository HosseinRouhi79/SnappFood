<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Trait\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerUpdateController extends Controller
{
    use HttpResponse;
    public function updatePersonal(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return $this->success($user,'user is updated successfully');
    }

    public function updateAddress(Request $request,$id)
    {
        $address = Address::where('user_id',Auth::id())->where('id',$id)->first();
        if($address == null){
            return $this->error('','you dont have access to change address',403);
        }
        $address->update($request->all());
        return $this->success($address,'address is updated successfully');
    }
}
