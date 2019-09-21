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
    <div class="col-12 p-0">
        <form method="post" action="{{url('/create/offer')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">Offer name:</label>
                        <input type="text" class="form-control" name="offer_name" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_short_description">Offer short description:</label>
                        <textarea cols="5" rows="5" class="form-control" name="offer_short_description"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_long_description">Offer long description:</label>
                        <textarea cols="5" rows="5" class="form-control" name="offer_long_description"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Offer link:</label>
                        <input type="text" class="form-control" name="offer_link" />
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="offer_worth">Offer worth:</label>
                            <input cols="5" rows="5" class="form-control" name="offer_worth"></input>
                        </div>
                    </div>
                </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Country</label>
                        <select class="form-control" name="country_id">
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Offer network:</label>
                            <input type="text" class="form-control" name="offer_network" />
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="offer_image">Offer image:</label>
                        <input type="file" id="offer_image" name="offer_image" accept="image/png, image/jpeg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection