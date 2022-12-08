@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sidebar')
            <div class="col-md-8 col- text-center mt-1.5">
                <div class="bg-primary p-3">
                    <a href="/admin/banners/create"><h4 style="color: #edf2f7">This is the active banner that created by {{$user->name}}</h4></a>
                </div>
                <hr>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Banner Title</th>
                            <th>Banner Description</th>
                            <th>Image</th>
                            <th>Setting</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->description}}</td>
                                <td><img src="{{asset("uploads")}}/{{$banner->image}}" width="90px" height="90px"
                                         alt="{{$banner->title}}"></td>


                                <td>
                                    <form action="/admin/banner/delete/{{$banner->id}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" title="Delete" data-toggle="tooltip"><i class ="material-icons"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                        {{$categories->links()}}--}}
                </div>

            </div>
        </div>
    </div>
@endsection
