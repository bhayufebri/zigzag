@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">HOME</li>
    <li class="breadcrumb-item">PAGE</li>
    <li class="breadcrumb-item active">DETAIL</li>
@endsection

@section('content')

    <h2 class="text-dark m-0 mb-3"> DETAIL PAGE</h2>

    <div class="card border-0">
        <div class="card-body p-5">

            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->title}}" readonly>
                </div>
            </div>
            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Slug</label>
                <div class="col-md-10">
                    <input type="email" class="form-control-plaintext text-lg-right" value="{{$page->slug}}" readonly>
                </div>
            </div>
            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->description}}" readonly> </input>
                </div>
            </div>
            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Meta Title</label>
                <div class="col-md-10">
                    <input class="form-control-plaintext text-lg-right" value="{{$page->meta_title}}" readonly>
                </div>
            </div>
            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->meta_description}}" readonly>
                </div>
            </div>

            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Meta Keyword</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->meta_keyword}}" readonly>
                </div>
            </div>

            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Page Type</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->page_type}}" readonly>
                </div>
            </div>

            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Page Type</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->page_type}}" readonly>
                </div>
            </div>

            @if(isset($page->image))
                <div class="form-group row border-bottom border-light">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-md-10">
                            <img class="img-responsive" width="200px" height="200px" src="{{ asset('uploads/image/pages/'.$page->image) }}" />
                    </div>
                </div>
            @endif

            <div class="form-group row border-bottom border-light">
                <label class="col-sm-2 col-form-label">Created at</label>
                <div class="col-md-10">
                    <input type="text" class="form-control-plaintext text-lg-right" value="{{$page->created_at}}" readonly>
                </div>
            </div>

        </div>

    </div>
    <br/>

    <a href="{{ route('pages.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
    <a class="btn bg-warning text-white px-4 d-block d-md-inline-block" href="{{route('pages.edit', $page->id)}}"> Edit</a>

    <!-- </form> -->
@endsection
@section('customjs')
    <script>
        $('#menuPage').addClass('active');
        $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
@endsection
