@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">HOME</li>
    <li class="breadcrumb-item active">PAGE</li>

@endsection

@section('content')

    <h2 class="text-dark m-0 mb-3">PAGE </h2>
    <div class="mb-4">
        <a href="{{ route('pages.create') }}" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-user-plus"></i> Add Page</a>
    </div>

    <div class="card border-0">
        <div class="table-responsive col-md-12">


            <table  id="pageTable" class="table table-striped table-bordered" >
                <thead>
                <tr>
                    <th width="5"><input type="checkbox"></th>
                    <th>Name</th>
                    <th width="150">Date</th>
                    <th width="100">Status</th>
                    <th width="50"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $page)

                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{$page->title}}</td>
                        <td> {{ date_format($page->created_at, "d F Y")  }} </td>
                        <td><small class="text-white text-nowrap py-1 px-3 text-center radius-5 d-block {{$page->is_publish == '1' ? 'bg-primary' : 'bg-warning' }} ">{{$page->is_publish == '1' ? 'Active' : 'Not Active'}}</small></td>
                        <td class="text-center text-nowrap">
                            <a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('pages.edit', $page->id) }}"><i class="feather-edit"></i></a>
                            <form  action="{{ route('pages.delete', $page->id) }}" method="post" style="display: inline-flex" >
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-link text-danger py-0 px-1 btn-sm "> <i class="feather-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-light">

        </div>
    </div>
@endsection
@section('customjs')
    <script>
        $('#menuPage').addClass('active');
    </script>

    <!-- MULTI SELECT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#multiselect').multiSelect();
            $('#pageTable').DataTable();
        });
    </script>
@endsection
