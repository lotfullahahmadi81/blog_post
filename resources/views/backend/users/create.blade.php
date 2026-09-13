@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">{{ __('language.createUser') }}</h5>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ __('language.chooseProfilePicture') }}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text"
                            name="profile_picture">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                     @error('profile')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">{{ __('language.username') }}</label>
                        <input type="text" name="name" id="name" placeholder="{{ __('language.userNamePlaceholder') }}"
                            class="form-control">
                    </div>
                    @error('name')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="email">{{ __('language.email') }}</label>
                        <input type="email" name="email" id="email" placeholder="{{ __('language.userEmailPlaceholder') }}"
                            class="form-control">
                    </div>
                    @error('email')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="password">{{ __('language.password') }}</label>
                        <input type="password" name="password" id="password" placeholder="{{ __('language.userPasswordPlaceholder') }}"
                            class="form-control">
                    </div>
                    @error('password')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('language.confirmationPassword') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="{{ __('language.userPasswordConfirmationPlaceholder') }}" class="form-control">
                    </div>
                    @error('password_confirmation')
                        <p class="text-danger m-1">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">{{ __('language.createUser') }}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
