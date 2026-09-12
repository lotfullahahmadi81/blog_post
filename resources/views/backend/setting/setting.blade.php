@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Setting</h5>
            <div class="card-body">
                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose Logo
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
                        <label for="subtitle">Email</label>
                        <input type="text" name="email" id="email" value="{{ $setting->email }}"
                            placeholder="Enter the website email ..." class="form-control">
                    </div>
                    @error('email')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Youtube</label>
                        <input type="text" name="youtube" id="youtube" value="{{ $setting->youtube }}"
                            placeholder="Enter the website youtube ..." class="form-control">
                    </div>
                    @error('youtube')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Instagram</label>
                        <input type="text" name="Instagram" id="Instagram" value="{{ $setting->instagram }}"
                            placeholder="Enter the website youtube ..." class="form-control">
                    </div>
                    @error('Instagram')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Facebook</label>
                        <input type="text" name="facebook" id="facebook" value="{{ $setting->facebook }}"
                            placeholder="Enter the website facebook ..." class="form-control">
                    </div>
                    @error('facebook')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Twitter</label>
                        <input type="text" name="twitter" id="twitter" value="{{ $setting->twitter }}"
                            placeholder="Enter the website twitter ..." class="form-control">
                    </div>
                    @error('twitter')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ $setting->phone }}"
                            placeholder="Enter the website phone ..." class="form-control">
                    </div>
                    @error('phone')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="subtitle">Address</label>
                        <input type="text" name="address" id="address" value="{{ $setting->address }}"
                            placeholder="Enter the website address ..." class="form-control">
                    </div>
                    @error('address')
                        <p class="text-danger m-1">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update Settings</button>
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
