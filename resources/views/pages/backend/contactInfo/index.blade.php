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
        <form method="post" action="{{action('ContactInformationController@update')}}" enctype="multipart/form-data"">
            {{csrf_field()}}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="phone_number">Phone number:</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$contact_info->phone_number}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="mail_contact">Mail contact:</label>
                        <input type="text" class="form-control" name="mail_contact" value="{{$contact_info->mail_contact}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea cols="5" rows="5" class="form-control" name="address">{{$contact_info->address}}</textarea>
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
