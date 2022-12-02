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
                <a href="/seller/profile/excel" class="mb-3 btn btn-outline-success">Number of all orders: {{$orders->count()}}</a>
                <form action="/seller/profile/report/filterDay" method="post">
                    @csrf
                <div class="input-group mb-3 justify-content-center">
                    <select style="width:200px;" class="custom-select" id="inputGroupSelect04" name="filterDay">
                        <option selected>Choose...</option>
                        <option value="1">yesterday</option>
                        <option value="2">today</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Filter</button>
                    </div>
                </div>
                </form>
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


