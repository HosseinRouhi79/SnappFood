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
                            <th>User_name</th>
                            <th>Address</th>
                            <th>Comment</th>
                            <th>Setting</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                   {{$address->address}}
                                </td>
                                @if(isset($comment))
                                <td style="color: darkblue">{{$comment->content}}</td>
                                @else
                                    <td style="color: red">No Comment</td>
                                @endif
                                <td>
                                    <div class="d-flex gap-2 mt-3">
                                    <form action="/seller/profile/submit/{{$order->id}}" method="post">
                                        @csrf
                                    <button class="btn btn-outline-success btn-sm">
                                        Submit
                                    </button>
                                    </form>
                                    <form action="/seller/profile/deleteAdmin/{{$order->id}}" method="post">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                            <a href="/seller/profile/response/{{$order->id}}" class="btn btn-outline-warning btn-sm">
                                                Response
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


