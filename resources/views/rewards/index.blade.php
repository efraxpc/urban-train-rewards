@extends('layouts.default')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Name</td>
              <td>Description</td>
              <td>Image</td>
              <td>Worth</td>
              <td>Type</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($rewards as $reward)
            <tr>
                <td>{{$reward->reward_name}}</td>
                <td>{{$reward->reward_description}}</td>
                <td><img src={{$reward->reward_image}} alt="reward image"/></td>
                <td>{{$reward->reward_worth}}</td>
                <td>{{$reward->reward_type_id}}</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection