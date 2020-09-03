@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">HOME</li>
    <li class="breadcrumb-item">CATEGORY</li>
    <li class="breadcrumb-item active"> {!! isset($categories) ? 'UPDATE' : 'CREATE' !!} </li>

@endsection

@section('content')

    <h2 class="text-dark m-0 mb-3"> {!! isset($categories) ? 'UPDATE' : 'CREATE' !!} CATEGORY</h2>

    <div class="card border-0 bg-white shadow-sm col-6">
        <div class="card-body">
            <form  action="{{  isset($categories) ? route('categories.update') : route('categories.store') }}" method="post" >
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PATCH">
            <div class="form">
                <div class="form-group">
                    <label for="">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{!! isset($categories) ? $categories->title : '' !!}">
                </div>

                <input class="btn btn-primary" type="submit" value="{!! isset($categories) ? 'UPDATE' : 'SAVE' !!}" />

            </div>
            </form>
        </div>
    </div>

@endsection
@section('customjs')
    <script>
        $('#menuArticle').addClass('active');
        $('#basic').addClass('active');
        $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>

@endsection
