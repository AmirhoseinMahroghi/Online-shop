@extends('home.layouts.home')


@section('title')
    پروفایل کاربری
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active"> پروفایل کاربری </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="my-account-wrapper pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row text-right" style="direction: rtl;">
                            <div class="col-lg-3 col-md-4">
                                @include('home.sections.users_profile')
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">

                                    <div class="myaccount-content">
                                        <h3> پروفایل </h3>
                                        <div class="account-details-form">
                                            <form action="{{ route('home.users_profile.update', auth()->id()) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">
                                                                نام و نام خانوادگی
                                                            </label>
                                                            <input type="text" id="first-name" name="name"
                                                                value="{{ auth()->user()->name }}" />
                                                            @error('name')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">
                                                                شماره تلفن
                                                            </label>
                                                            <input type="text" id="last-name" name="cellphone"
                                                                value="{{ auth()->user()->cellphone }}" />
                                                            @error('cellphone')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required"> ایمیل </label>
                                                    <input type="email" id="email" disabled
                                                        value="{{ auth()->user()->email }}" />
                                                </div>

                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn" type="submit"> تبت تغییرات </button>
                                                </div>
                                                <br>
                                            </form>
                                            <form action="{{ route('home.users_profile.updatepassword', auth()->id()) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <fieldset>
                                                    <legend> تغییر پسورد </legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">
                                                                    رمز عبور جدید
                                                                </label>
                                                                <input type="password" id="new-pwd" name="password" />
                                                                @error('password')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required"> تکرار
                                                                    رمز عبور </label>
                                                                <input type="password" id="confirm-pwd"
                                                                    name="password_confirmation" />
                                                                @error('password_confirmation')
                                                                    <p class="input-error-validation">
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn "> تغییر رمز عبور </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
@endsection
