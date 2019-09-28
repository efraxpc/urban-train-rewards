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
        <form method="post" action="{{action('WellcomeEmailInfoController@update')}}" enctype="multipart/form-data"">
            {{csrf_field()}}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="tittle">Tittle:</label>
                        <input type="text" class="form-control" name="tittle" value="{{$wellcome_email_info->tittle}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="pre_footer">Pre footer:</label>
                        <input type="text" class="form-control" name="pre_footer" value="{{$wellcome_email_info->pre_footer}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="pre_footer">Footer:</label>
                        <input type="text" class="form-control" name="footer" value="{{$wellcome_email_info->footer}}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Content:</label>
                        <textarea cols="5" rows="5" class="form-control" name="content">{{$wellcome_email_info->content}}</textarea>
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