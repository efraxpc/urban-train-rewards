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
        <form method="post" action="{{url('/backend/create/user')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">User name:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="last_name">User last name:</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">User email:</label>
                        <input cols="5" rows="5" class="form-control" type="email" name="email" value="{{ old('email') }}"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="points">User points:</label>
                        <input cols="5" rows="5" class="form-control" name="points" value="{{ old('points') }}"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input cols="5" rows="5" class="form-control" name="password" value="{{ old('password') }}"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm password:</label>
                        <input cols="5" rows="5" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"></input>
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