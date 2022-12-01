@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sidebar')
            <div class="col-md-8 col- text-center mt-1.5">
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->content}}</td>
                        </tr>
                        </tbody>
                    </table>
                    {{--                        {{$categories->links()}}--}}
                </div>
            </div>
        </div>
    </div>

@endsection

