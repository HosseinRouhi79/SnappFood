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
                <form action="/seller/profile/comments/filter" method="post">
                    @csrf
                <div class="input-group mb-5">
                    <div class="form-outline">
                        <input type="search" name="search" id="form1" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 75px;height: 38px">
                       search
                    </button>
                </div>
                </form>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>
                                    {{$comment->content}}
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


