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
            <h3 id="error" style="color: red"></h3>
            <div class="col-md-8 col- text-center mt-1.5">
                <form id="form_id" method="post" action="/seller" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <div class="text-start">
                            <label for="name">Restaurant name</label>
                        </div>
                        <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Enter restaurant name">
                        <div class="text-start">
                            <label for="phone">Phone</label>
                        </div><input type="text" class="form-control mb-3" name="phone" id="phone" placeholder="Enter restaurant phone">
                        <div class="text-start">
                            <label for="address">Address</label>
                        </div><input type="text" class="form-control mb-3" name="address" id="address" placeholder="Enter restaurant phone">

                        <div class="text-start">
                            <label for="start">Start</label>
                        </div><input type="time" class="form-control mb-3" name="start" id="start" placeholder="Enter start time">

                        <div class="text-start">
                            <label for="end">End</label>
                        </div><input type="time" class="form-control mb-3" name="end" id="end" placeholder="Enter end time">


                        <select id="restaurant_type" class="form-select mt-4 mb-3" aria-label="Default select example" name="restaurant_type">
                            <option style="color: black;background-color: #edf2f7" selected>Select Restaurant Type</option>
                            @foreach($restaurants as $restaurant)
                                <option style="color: black;background-color: #edf2f7" value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                        <div id="map" style="width: 400px; height: 250px; background: #eee; border: 2px solid #aaa;"></div>
                        <button type="submit" class="btn btn-success mt-4">Submit</button>


                            <script type="text/javascript">

                                var map = new L.Map('map', {
                                        key: 'web.7d2d75fb570a43fd9efe6d5f75632308',
                                        maptype: 'dreamy',
                                        poi: true,
                                        traffic: false,
                                        center: [35.699739, 51.398097],
                                        zoom: 14
                                    }
                                );
                                var marker = L.marker([35.699739, 51.398097]).addTo(map);


                                marker.bindPopup("<b>SnappFood!</b><br>You Are Here.").openPopup();

                                // function onMapClick(e) {
                                //     alert("You clicked the map at " + e.latlng);
                                // }
                                var loc = {}
                                var addMarker = (e)=>{
                                    var newMarker = new L.marker(e.latlng).addTo(map);
                                    loc=newMarker._latlng;

                                }




                                $("#form_id").submit(function(e){
                                    e.preventDefault();

                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost:8000/seller",
                                        data: {
                                            location: JSON.stringify(loc),
                                            name: $("#name").val(),
                                            start: $("#start").val(),
                                            end: $("#end").val(),
                                            phone: $("#phone").val(),
                                            address: $("#address").val(),
                                            restaurant_type: $("#restaurant_type").val(),

                                            _token: '{{csrf_token()}}'
                                        },
                                        cache: false,
                                        success: function (data) {
                                            window.location.replace("http://localhost:8000/seller/profile");
                                        },
                                        error: function (xhr, status, error) {
                                            var errors = JSON.parse(xhr.responseText);
                                            // console.log(errors)
                                            $('#error').html(errors.message)
                                        }
                                    })
                                });


                                map.on('click', addMarker);
                                map.setMapType("neshan");
                                </script>




                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
