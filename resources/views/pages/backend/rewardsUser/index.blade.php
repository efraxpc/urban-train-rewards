@extends('layouts.backend.default')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-12">
                <a role="button" class="btn btn-primary" href="{{ url('/backend/create/rewards_user') }}">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="responsive nowrap table table-striped" id="rewards-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td class="text-center desktop">Reward</td>
                        <td class="text-center desktop mobile tablet">User</td>
                        <td class="text-center desktop">Avaible</td>
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
    $('#rewards-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        index: SITEURL + "rewards_user/data",

        columns: [
            { data: 'id', name: 'id', "visible": false, "searhable": false },
            { data: 'reward_name', name: 'reward_name' },
            { data: 'user_name', name: 'user_name' },
            { data: 'avaible', name: 'avaible' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        "columnDefs": [
            {
                'targets': 2,
                'render': function (data, type, full, meta) {
                    return full.user_name+ ' ' +full.user_last_name;
                }
            }
        ],
        order: [[0, 'desc']]
    });

</script>
@stop