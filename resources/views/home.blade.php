@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @can('isAdmin')
                            {{ __('You are logged in!') }}
                        @endcan
                        @can('isAdmin')
                            <div class="row text-center">
                                <div class="col-">
                                    <image style="width: 60px" alt="manage"
                                           src="{{asset('images/management.svg')}}"></image>
                                    <h4 class="text-center mt-3">
                                        <a style="text-decoration: none" href="{{route('admin')}}">Go to admin panel</a>
                                    </h4>
                                </div>
                            </div>
                        @endcan
                        @can('isSeller')
                            <div class="text-center mb-3">
                                <img src="{{asset('images/sellerman.svg')}}" alt="sellerman" width="100px">
                            </div>
                            <div class="col-md-12 col-">
                                <div class="list-group">
                                    <a href="{{route('sellerForm')}}"
                                       class="list-group-item list-group-item-action text-center">
                                        Complete the information</a>
                                    <a href="/admin/foodType"
                                       class="list-group-item list-group-item-action text-center">
                                        Setting</a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
