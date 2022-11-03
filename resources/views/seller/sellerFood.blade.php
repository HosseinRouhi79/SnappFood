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
            @include('inc.sellerSidebar')
            <div class="col-md-8 col- text-center mt-1.5">
                <form method="post" action="/seller/profile" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="name" class="p-2"><strong>Food name</strong></label>
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control" name="name" id="name" placeholder="Food Name...">
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control mt-4" name="recipe" id="recipe" placeholder="Recipe...">
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control mt-4" name="discount" id="discount" placeholder="discount...">

                        <div class="input-group mb-3 mt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <select class="form-select mt-4 mb-3" aria-label="Default select example" name="food_type">
                            <option selected>Select Food Category</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
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
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
