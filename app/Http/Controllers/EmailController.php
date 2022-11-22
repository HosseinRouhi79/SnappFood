<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $user = User::where('id',Auth::id())->first();

        dispatch(new CustomerJob($user));

        dd('email is sent successfully');
    }
}
