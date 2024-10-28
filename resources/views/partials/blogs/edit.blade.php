<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
</div>

<div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea name="body" id="body" class="form-control summernote" rows="5" required>{{ $blog->body }}</textarea>
</div>
<div class="mb-3">
    <label for="body" class="form-label">Image</label>
    <input type="file" name="img" class="form-control">

    <?php if(!empty($blog->image) && $blog->image != null){ ?>
    <img src="{{ asset($blog->image) }}" class="img-fluid" style="width: 200px; height:200px">
    <?php } ?>
</div>
<div class="mb-3">
    <label for="meta_title" class="form-label">Meta Title</label>
    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $blog->meta_title }}">
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label">Meta Description</label>
    <input type="text" name="meta_description" id="meta_description" class="form-control summernote"
        value="{{ $blog->meta_description }}">
</div>

<div class="mb-3">
    <label for="meta_keywords" class="form-label">Meta Keywords</label>
    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
        value="{{ $blog->meta_keywords }}">
</div>

<button type="submit" class="btn btn-primary">Update</button>
