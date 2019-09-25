@extends('layouts.backend.default')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-12">
                <a role="button" class="btn btn-primary" href="{{ url('/backend/create/user') }}"">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="responsive nowrap table table-striped" id="users-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td class="text-center desktop mobile tablet">Name</td>
                        <td class="text-center desktop">Last name</td>
                        <td class="text-center desktop tablet">Email</td>
                        <td class="text-center desktop">Points</td>
                        <td class="text-center desktop">Completed Surveys</td>
                        <td class="text-center desktop">Username</td>
                        <td>Actions</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>
@stop

@section('scripts')
<script>
    var SITEURL = '{{URL::to('')}}';
    $('#users-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        index: SITEURL + "users/data",

        columns: [
            { data: 'id', name: 'id', "visible": false, "searhable": false },
            { data: 'name', name: 'name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'points', name: 'points' },
            { data: 'completed_surveys', name: 'completed_surveys' },
            { data: 'username', name: 'username' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[0, 'desc']]
    });
    function strtrunc(str, max, add) {
        add = add || '...';
        return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
    };

</script>
@stop