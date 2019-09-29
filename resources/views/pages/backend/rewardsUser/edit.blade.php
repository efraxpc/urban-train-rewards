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
        <form method="post" action="{{action('RewardUserController@update', $id)}}">
            {{csrf_field()}}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">User</label>
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <select class="form-control" name="user" id="exampleFormControlSelect2" value="{{ old('user') }}">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @if ($user->id == $reward_user->user_id) selected @endif>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Reward</label>
                    <select class="form-control" name="reward">
                        @foreach($rewards as $reward)
                            <option value="{{$reward->id}}" @if ($reward->id == $reward_user->reward_id) selected @endif>{{$reward->reward_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Avaible</label>
                    <input type="checkbox" name="avaible" value="1"  @if ($reward_user->avaible == 1) checked @endif>
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