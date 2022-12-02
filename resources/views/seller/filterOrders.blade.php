@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sellerSidebar')
            <div class="col-md-8 col- text-center mt-1.5">
                <h2>Welcome {{$user->restaurant->name}}</h2>
                <hr>
                <br>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <br>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Restaurant ID</th>
                            <th>Foods</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->restaurant_id}}</td>
                                <td>
                                @foreach($order->food as $food)
                                    {{$food->name}} (Num: {{$food->pivot->count}},
                                    Price: {{$food->price*$food->pivot->count}})<br>
                                @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


