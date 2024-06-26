@extends('home.layouts.home')


@section('title')
    صفحه ورود کاربر
@endsection

@section('script')
    <script>
       let loginToken;
        $('#checkOTPForm').hide();

        $('#loginForm').submit(function(event) {
            //console.log($('#cellphoneInput').val());
            event.preventDefault();

            $.post("{{ route('login.cellphone') }}", {
                '_token': "{{ csrf_token() }}",
                'cellphone': $('#cellphoneInput').val()

            }, function(response, status) {
                console.log(response, status);
                loginToken = response.login_token;

                swal({
                    icon : 'success',
                    text: 'رمز یکبار مصرف برای شما ارسال شد',
                    button : 'حله!',
                    timer : 2000
                });



                 $('#loginForm').fadeOut();
                $('#checkOTPForm').fadeIn();


            }).fail(function(response) {
                console.log(response.responseJSON);
                $('#cellphoneInput').addClass('mb-1');
                $('#btn').addClass('mt-3');
                $('#cellphoneInputError').fadeIn();
                $('#cellphoneInputErrorText').html(response.responseJSON.errors.cellphone);
            })
        });
    </script>
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active"> ورود کاربر </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="login-register-area pt-100 pb-100" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> ورود کاربر </h4>
                            </a>
                        </div>
                        <div class="tab-content">

                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form id="loginForm">
                                            <input id="cellphoneInput" type="text" placeholder="شماره تلفن">

                                            <div id="cellphoneInputError" class="input-error-validation">
                                                <strong id="cellphoneInputErrorText"></strong>
                                            </div>

                                            <div class="button-box d-flex justify-content-between">
                                                <button type="submit">ارسال</button>
                                            </div>
                                        </form>

                                        <form id="checkOTPForm">
                                            <input id="checkOTPInput" type="text" placeholder="رمز یک بار مصرف">

                                            <div id="checkOTPInputError" class="input-error-validation">
                                                <strong id="checkOTPInputErrorText"></strong>
                                            </div>

                                            <div class="button-box d-flex justify-content-between">
                                                <button type="submit">ورود</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
