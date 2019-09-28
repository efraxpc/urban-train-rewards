@extends('layouts.backend.default')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif
<div class="row">
    <div class="col-12">
        <form method="post" action="{{action('OfferController@update', $id)}}" enctype="multipart/form-data"">
            {{csrf_field()}}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">Offer name:</label>
                        <input type="text" class="form-control" name="offer_name" value="{{$offer->offer_name}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_short_description">Offer short description:</label>
                        <textarea cols="5" rows="5" class="form-control" name="offer_short_description">{{$offer->offer_short_description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_long_description">Offer long description:</label>
                        <textarea cols="5" rows="5" class="form-control" name="offer_long_description" id="offer_long_description">{{$offer->offer_long_description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Offer link:</label>
                        <input type="text" class="form-control" name="offer_link" value="{{$offer->offer_link}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="offer_worth">Offer worth:</label>
                            <input cols="5" rows="5" class="form-control" name="offer_worth" value="{{$offer->offer_worth}}"></input>
                        </div>
                    </div>
                </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Country</label>
                        <select class="form-control" name="country_id">
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if ($offer->country_id == $country->id) selected @endif>{{$country->country_name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Offer network:</label>
                            <input type="text" class="form-control" name="offer_network" value="{{$offer->offer_network}}"/>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_image">Offer image:</label>
                        <input type="file" id="offer_image" name="offer_image" accept="image/png, image/jpeg" value="{{$offer->offer_image}}">
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="refferals">Offer refferals:</label>
                            <input cols="5" rows="5" class="form-control" name="refferals" value="{{$offer->refferals}}" type="number"></input>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    $( document ).ready(function() {
        tinymce.init({
        selector:'textarea#offer_long_description',
        plugins: "image",
        image_list: [
            {title: 'My image 1', value: 'https://www.tinymce.com/my1.gif'},
            {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
        ]
    });
    });
</script>

@endsection