@extends('layouts.backend.default')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-12">
                <a role="button" class="btn btn-primary" href="{{ url('/backend/create/offer') }}"">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="responsive nowrap table table-striped" id="rewards-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td class="text-center desktop mobile tablet">Name</td>
                        <td class="text-center desktop">Short Description</td>
                        <td class="text-center desktop tablet">Link</td>
                        <td class="text-center desktop">Worth</td>
                        <td class="text-center desktop">Network</td>
                        <td class="text-center desktop">Image</td>
                        <td class="text-center desktop">Country</td>
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
    var storage_path = '{{asset("")}}uploads/images/';
    $('#rewards-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        index: SITEURL + "rewards/data",

        columns: [
            { data: 'id', name: 'id', "visible": false, "searhable": false },
            { data: 'offer_name', name: 'offer_name' },
            { data: 'offer_short_description', name: 'offer_short_description' },
            { data: 'offer_link', name: 'offer_link' },
            { data: 'offer_worth', name: 'offer_worth' },
            { data: 'offer_network', name: 'offer_network' },
            { data: 'offer_image', name: 'offer_image' },
            { data: 'country', name: 'country', searchable: false  },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        "columnDefs": [
            {
                'targets': 2,
                'render': function (data, type, full, meta) {
                    if (type === 'display') {
                        data = strtrunc(data, 20);
                    }
                    return data;
                }
            },
            {
                'targets': 3,
                'render': function (data, type, full, meta) {
                    if (type === 'display') {
                        data = strtrunc(data, 20);
                    }
                    return data;
                }
            },
            {
                "targets": 6,
                "render": function (data, type, row, meta) {
                    return "<img src='" + data + "' class='figure-img img-fluid rounded img-reward'/>"
                }
            },
        ],
        order: [[0, 'desc']]
    });
    function strtrunc(str, max, add) {
        add = add || '...';
        return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
    };

</script>
@stop