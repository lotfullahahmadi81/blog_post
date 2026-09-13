@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">{{ __('language.createPost') }}</h5>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('language.title') }}</label>
                        <input type="text" name="title" id="title" placeholder="{{ __('language.postTitlePlaceholder') }}"
                            class="form-control">
                    </div>
                    @error('title')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.subtitle') }}</label>
                        <input type="text" name="subtitle" id="subtitle" placeholder="{{ __('language.postSubtitlePlaceholder') }}"
                            class="form-control">
                    </div>
                    @error('subtitle')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="description">{{ __('language.description') }}</label>
                        <textarea name="description" id="description" placeholder="{{ __('language.postDescriptionPlaceholder') }}" class="form-control my-editor"
                            rows="10"></textarea>
                    </div>
                    @error('description')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">{{ __('language.createPost') }}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
