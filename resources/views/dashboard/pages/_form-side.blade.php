<div class="row">
    <div class="col-sm-4">
        <div class="form-group {!! $errors->has('page_type') ? 'has-error' : '' !!}">
            <label>Page Template</label>
            <select class="form-control" name="page_type">
                <option value="single-page" {{ isset($pages->page_type) && $pages->page_type == 'single-page' ? 'selected="selected"':'' }}>  Single Page</option>
                <option value="article-list" {{ isset($pages->page_type) && $pages->page_type == 'article-list' ? 'selected="selected"':'' }}>Article List</option>
            </select>
            {!! $errors->first('page_type', '<span class="help-block form-error">:message</span>') !!}
        </div>

{{--        <div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">--}}
{{--            <label>Category</label>--}}
{{--            <select class="form-control" name="category_id">--}}
{{--                <option value="">Select</option>--}}
{{--                @foreach($categories as $p)--}}
{{--                    <option value="{{ $p->id }}" {{ isset($articles->category_id) && $articles->category_id == $p->id ? 'selected="selected"':'' }}>--}}
{{--                        {{ $p->title }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            {!! $errors->first('category_id', '<span class="help-block form-error">:message</span>') !!}--}}
{{--        </div>--}}

        <div class="form-group {!! $errors->has('is_active') ? 'has-error' : '' !!}">
            <label>Status</label>
            <select class="form-control" name="is_publish">
                <option {{ isset($pages->is_publish) && $pages->is_active_show == '1' ? 'selected="selected"' : '' }} value="1">Publish</option>
                <option {{ isset($pages->is_publish) && $pages->is_active_show == '0' ? 'selected="selected"' : '' }} value="0">Draft</option>
            </select>
            {!! $errors->first('is_publish', '<span class="help-block form-error">:message</span>') !!}
        </div>

        <div class="form-group ">
            <label>Image</label>
            @if(isset($pages->image))
                <div class="imagesquare">
                    <img class="img-responsive" width="200px" height="200px" src="{{ asset('uploads/image/pages/'.$pages->image) }}" />
                </div>
            @endif
            <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg" >
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control" name="meta_title"  value="{{  isset($pages->meta_title) ? $pages->meta_title : old('meta_title') }}">
        </div>
        <div class="form-group">
            <label>Meta Keyword</label>
            <input type="text" class="form-control" name="meta_keyword" value="{{  isset($pages->meta_keyword) ? $pages->meta_keyword : old('meta_keyword') }}">
        </div>
        <div class="form-group">
            <label>Meta Description En</label>
            <textarea type="text" class="form-control" name="meta_description" rows="2" >{{  isset($pages->meta_description) ? $pages->meta_description : old('meta_description') }}</textarea>
        </div>
    </div>
</div>

