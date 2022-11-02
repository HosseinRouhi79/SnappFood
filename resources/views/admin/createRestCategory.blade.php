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
                <form method="post" action="/admin/restaurantType">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name" class="p-2"><strong>Restaurant Category</strong></label>
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control" name="name" id="name" placeholder="Category...">
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
