@extends('frontend.layout.master')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/contact-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>{{ __('language.contactMe') }}</h1>
                        <span class="subheading">{{ __('language.contactMeDescription') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{ __('language.contactMessage') }}</p>
                    <div class="my-5">
                        <form id="contactForm" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">{{ __('language.name') }}</label>
                                @error('name')
                                    <p class="text-danger">$message</p>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="Enter your email..." data-sb-validations="required,email" />
                                <label for="email">{{ __('language.email') }}</label>
                                @error('email')
                                    <p class="text-danger">$message</p>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" type="tel"
                                    placeholder="Enter your phone number..." name="phone" />
                                <label for="phone">{{ __('language.phone') }}</label>
                                @error('phone')
                                    <p class="text-danger">$message</p>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..."
                                    style="height: 12rem" data-sb-validations="required"></textarea>
                                <label for="message">{{ __('language.message') }}</label>
                                @error('message')
                                    <p class="text-danger">$message</p>
                                @enderror
                            </div>
                            <br />
                            <button class="btn btn-primary text-uppercase disabled" id="submitButton"
                                type="submit">{{ __('language.send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
