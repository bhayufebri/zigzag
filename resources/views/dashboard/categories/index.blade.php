@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">HOME</li>
    <li class="breadcrumb-item active">CATEGORY</li>


@endsection

@section('content')

    <h2 class="text-dark m-0 mb-3">CATEGORY </h2>
    <div class="mb-4">
        <a href="{{ isset($categories) ? route('categories.update') : route('categories.create') }}" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-plus"></i> Add New Category</a>
    </div>

    <div class="card border-0">

        <div class="table-responsive col-md-12">


            <table  id="pageTable" class="table table-striped table-bordered" >
                <thead>
                <tr>

                    <th >ID</th>
                    <th >Title</th>
                    <th >Type</th>
                    <th >Created</th>
                    <th ></th>

                </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer bg-white border-light">

        </div>
    </div>
@endsection
@section('customjs')
    <script>
        $('#menuArticle').addClass('active');

    </script>
    <script>

        $(document).ready(function() {

            var oTable = $('#pageTable').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: "{!! route('categories.indexData') !!}",
                    type: 'GET',
                },
                order: [[0, 'desc']],
                columns: [
                    {data: 'id', name: 'id', orderable: false, searchable:false},
                    {data: 'title', name: 'title'},
                    {data: 'type', name: 'type'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action' , name: 'action'}
                ],
                columnDefs: [],

            });


        } );
    </script>

    <!-- MULTI SELECT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>


    <script>
        $(document).ready( function () {
            $('#multiselect').multiSelect();
        });
    </script>
@endsection
