{!! csrf_field() !!}
<div class="form-group">
    <label class="col-form-label">Name</label>
    <input class="form-control" type="text" name="title" placeholder="Page title" required value="{{old('title', isset($page)?$page->title:'')}}">
</div>

<div class="form-group">
    <label class="col-form-label">Slug</label>
    <input class="form-control" type="text" name="slug" placeholder="Page slug" value="{{old('slug', isset($page)?$page->slug:'')}}">
</div>

<div class="form-group">
    <label class="col-form-label">Cover</label>
    <input class="form-control" type="file" name="cover">
    @if(isset($page))
    <div>
        <img src="{{ asset('storage').'/'.$page->cover }}" class="thumbnail" width="150px">
    </div>
    @endif
</div>

<div class="form-group">
    <label class="col-form-label">Body</label>
    <textarea class="form-control" name="body" cols="30" rows="10">{{old('body', isset($page)?$page->body:'')}}</textarea>
</div>
