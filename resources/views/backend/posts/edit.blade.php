@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Edit Post</h5>
            <div class="card-body">
                <form action="{{ route('posts.update',[$posts->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $posts->title }}"
                            placeholder="Enter post title ..." class="form-control">
                    </div>
                    @error('title')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{ $posts->sub_title }}"
                            placeholder="Enter post subtitle ..." class="form-control">
                    </div>
                    @error('subtitle')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" placeholder="Enter post description ..." class="form-control my-editor"
                            rows="10">{{ $posts->description }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
