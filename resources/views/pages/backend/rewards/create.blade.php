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
        <form method="post" action="{{url('/backend/create/reward')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">Reward name:</label>
                        <input type="text" class="form-control" name="reward_name" value="{{ old('reward_name') }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="reward_description">Reward description:</label>
                        <textarea cols="5" rows="5" class="form-control" name="reward_description">{{ old('reward_description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="reward_worth">Reward worth:</label>
                        <input cols="5" rows="5" class="form-control" name="reward_worth" value="{{ old('reward_worth') }}"></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Reward type</label>
                        <select class="form-control" name="reward_type" value="{{ old('reward_type') }}">
                            @foreach($reward_types as $reward_type)
                            <option value="{{$reward_type->id}}">{{$reward_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="reward_image">Reward image:</label>
                        <input type="file" id="reward_image" name="reward_image" accept="image/png, image/jpeg">
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