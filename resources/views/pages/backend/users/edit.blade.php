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
        <form method="post" action="{{action('UserController@update', $id)}}" enctype="multipart/form-data"">
            {{csrf_field()}}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">User name:</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="last_name">User last name:</label>
                        <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">User email:</label>
                        <input cols="5" rows="5" class="form-control" type="email" name="email" value="{{$user->last_name}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="points">User points:</label>
                        <input cols="5" rows="5" class="form-control" name="points" value="{{$user->points}}"/>
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