@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Create Post</h5>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter post title ..."
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" name="subtitle" id="subtitle" placeholder="Enter post subtitle ..."
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" placeholder="Enter post description ..." class="form-control my-editor"
                            rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
