@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">HOME</li>
    <li class="breadcrumb-item">PAGE</li>
    <li class="breadcrumb-item active"> CREATE PAGE</li>

@endsection

@section('content')

    <h2 class="text-dark m-0 mb-3"> CREATE PAGE</h2>

    <form  action="{{ route('dashboard.pages.store') }}" method="post" enctype="multipart/form-data">
        <div class="card border-0 bg-white shadow-sm mb-4">
            <div class="card-body p-5">
                <div class="form">
                    @include('dashboard.pages._form-side')
                </div>
            </div>
        </div>

        <div class="card border-0 bg-white shadow-sm">
            <div class="card-body p-5">
                <div class="form">
                    {!! csrf_field() !!}
                    @include('dashboard.pages._form')
                </div>
            </div>

        </div>
        <br/>
        <input class="btn bg-accent text-white py-3 px-5 d-block d-md-inline-block" value="Simpan" type="submit" />
    </form>
@endsection

@section('customjs')
    <script>
      $("#title").keyup(function () {
          var str = $(this).val();
          var trims = $.trim(str);
          var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
          $("#slug").val('pages'+ '-' + slug.toLocaleLowerCase());
      });
      $("#title_idn").keyup(function () {
          var str = $(this).val();
          var trims = $.trim(str);
          var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
          $("#slug_idn").val('pages'+ '-' + slug.toLocaleLowerCase());
      })
    </script>

    <!-- QUILL EDITOR -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['image'],
            ['clean']
        ];

        var quill = new Quill('#detail', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });
        var quill = new Quill('#description_idn', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

    </script>

@endsection
