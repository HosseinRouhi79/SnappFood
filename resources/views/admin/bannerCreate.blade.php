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
                <form method="post" action="/admin/banners/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="title" class="p-2"><strong>Title</strong></label>
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control" name="title" id="name" placeholder="Title...">
                        <input style="color: black;background-color: #edf2f7" type="text" class="form-control mt-4" name="description" id="description" placeholder="Description...">
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
