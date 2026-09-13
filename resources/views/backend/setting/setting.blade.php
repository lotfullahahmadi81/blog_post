@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">{{ __('language.setting') }}</h5>
            <div class="card-body">
                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> {{ __('language.chooseLogo') }}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" value="{{ $setting->logo }}"
                            name="logo">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('logo')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.email') }}</label>
                        <input type="text" name="email" id="email" value="{{ $setting->email }}"
                            placeholder="{{ __('language.emailPlaceholder') }}" class="form-control">
                    </div>
                    @error('email')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.youtube') }}</label>
                        <input type="text" name="youtube" id="youtube" value="{{ $setting->youtube }}"
                            placeholder="{{ __('language.youtubePlaceholder') }}" class="form-control">
                    </div>
                    @error('youtube')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.instagram') }}</label>
                        <input type="text" name="Instagram" id="Instagram" value="{{ $setting->instagram }}"
                            placeholder="{{ __('language.instagramPlaceholder') }}" class="form-control">
                    </div>
                    @error('Instagram')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.facebook') }}</label>
                        <input type="text" name="facebook" id="facebook" value="{{ $setting->facebook }}"
                            placeholder="{{ __('language.facebookPlaceholder') }}" class="form-control">
                    </div>
                    @error('facebook')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.twitter') }}</label>
                        <input type="text" name="twitter" id="twitter" value="{{ $setting->twitter }}"
                            placeholder="{{ __('language.twitterPlaceholder') }}" class="form-control">
                    </div>
                    @error('twitter')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.phone') }}</label>
                        <input type="text" name="phone" id="phone" value="{{ $setting->phone }}"
                            placeholder="{{ __('language.phonePlaceholder') }}" class="form-control">
                    </div>
                    @error('phone')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">{{ __('language.address') }}</label>
                        <input type="text" name="address" id="address" value="{{ $setting->address }}"
                            placeholder="{{ __('language.addressPlaceholder') }}" class="form-control">
                    </div>
                    @error('address')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">{{ __('language.updateSettings') }}</button>
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
