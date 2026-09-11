@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">About</h5>
            <div class="card-body">
                <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{$about->title}}" placeholder="Enter about title ..."
                            class="form-control">
                    </div>
                    @error('title')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{$about->sub_title}}" placeholder="Enter about subtitle ..."
                            class="form-control">
                    </div>
                    @error('subtitle')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" placeholder="Enter about description ..." class="form-control my-editor"
                            rows="10">@php echo $about->description @endphp</textarea>
                    </div>
                    @error('description')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
