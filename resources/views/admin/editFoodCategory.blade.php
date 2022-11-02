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
                <form method="POST" action="/admin/foodType/{{$food->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <label for="name" class="p-2"><strong>Food Category</strong></label>
                        <input value="{{$food->name}}" style="color: black;background-color: #edf2f7" type="text" class="form-control" name="name" id="name" placeholder="Category...">
                        <select class="form-select mt-4 mb-3" aria-label="Default select example" name="restaurant_type_id_edit">
                            <option selected value="{{$food->restaurant_type_id}}">Select Restaurant Category</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                        <div class="text-start">
                            <label for="image">Image</label>
                        </div>
                        <div class="input-group mb-3">
                            <div class="mb-3">
                                <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
