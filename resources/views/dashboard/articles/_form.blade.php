<div class="row">
    <div class="col-md-6">
        <div class="form-group {!! $errors->has('title_idn') ? 'has-error' : '' !!}">
            <label>Title Id<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title_idn" value="{{ isset($pages->title_idn) ? $pages->title_idn : old('title_idn') }}" id="title_idn">
            {!! $errors->first('title_idn', '<span class="help-block form-error">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
            <label>Title En<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ isset($pages->title) ? $pages->title : old('title') }}" id="title">
            {!! $errors->first('title', '<span class="help-block form-error">:message</span>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <div class="form-group {!! $errors->has('slug_idn') ? 'has-error' : '' !!}">
            <label>Slug Id<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="slug_idn" value="{{ isset($pages->slug_idn) ? $pages->slug_idn : old('slug_idn') }}" id="slug_idn">
            {!! $errors->first('slug_idn', '<span class="help-block form-error">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
            <label>Slug En<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="slug" value="{{ isset($pages->slug) ? $pages->slug : old('slug') }}" id="slug">
            {!! $errors->first('slug', '<span class="help-block form-error">:message</span>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Description Id</label>
            <textarea id="description_idn" name="description_idn" style="min-height: 200px; width: 100%">{{  isset($pages->description_idn) ? $pages->description_idn : old('description_idn') }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Description En</label>
            <textarea id="detail" name="description" style="min-height: 200px; width: 100%">{{  isset($pages->description) ? $pages->description : old('description') }}</textarea>
        </div>
    </div>
</div>

