@extends('home.layouts.home')


@section('title')
    صفحه درباه ی ما
@endsection

@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">صفحه ای اصلی</a>
                    </li>
                    <li class="active"> در باره ما </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="about-story-area pt-100 pb-100" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="story-img">
                        <a href="{{ route('home.index') }}"><img src="{{ asset('home/assets/img/banner/about_us.jpg') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="story-details pl-50">
                        <div class="story-details-top">
                            <h2> خوش آمدید به <span> وب پروگ</span></h2>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                        </div>
                        <div class="story-details-bottom">
                            <h4> لورم ایپسوم متن ساختگی </h4>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                        </div>
                        <div class="story-details-bottom">
                            <h4> لورم ایپسوم متن ساختگی </h4>
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="feature-area pt-50 pb-50" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-feature text-right mb-40">
                        <div class="feature-icon">
                            <img src="{{ asset('home/assets/img/icon-img/free-shipping.png') }}" alt="" />
                        </div>
                        <div class="feature-content">
                            <h4>لورم ایپسوم</h4>
                            <p>لورم ایپسوم متن ساختگی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-feature text-right mb-40 pl-50">
                        <div class="feature-icon">
                            <img src="{{ asset('home/assets/img/icon-img/support.png') }}" alt="" />
                        </div>
                        <div class="feature-content">
                            <h4>لورم ایپسوم</h4>
                            <p>24x7 لورم ایپسوم</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-feature text-right mb-40">
                        <div class="feature-icon">
                            <img src="{{ asset('home/assets/img/icon-img/security.png') }}" alt="" />
                        </div>
                        <div class="feature-content">
                            <h4>لورم ایپسوم</h4>
                            <p>لورم ایپسوم متن ساختگی</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-area pt-80 pb-95 section-margin-1"
        style="background-image: url({{ asset('home/assets/img/bg/bg-1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto">
                    <div class="testimonial-active owl-carousel nav-style-1">
                        <div class="single-testimonial text-center">
                            <img src="{{ asset('home/assets/img/testimonial/testi-1.png') }}" alt="" />
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است. چاپگرها و
                                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                                درصد گذشته، حال و
                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                            </p>
                            <div class="client-info">
                                <img src="{{ asset('home/assets/img/icon-img/testi.png') }}" alt="" />
                                <h5>لورم ایپسوم</h5>
                            </div>
                        </div>
                        <div class="single-testimonial text-center">
                            <img src="{{ asset('home/assets/img/testimonial/testi-2.png') }}" alt="" />
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است. چاپگرها و
                                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                مورد نیاز و
                                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                                درصد گذشته، حال و
                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                            </p>
                            <div class="client-info">
                                <img src="{{ asset('home/assets/img/icon-img/testi.png') }}" alt="" />
                                <h5>لورم ایپسوم</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-area pt-100 pb-65">
        <div class="container">
            <div class="row">
                @foreach ($BottomBanners->chunk(3)->last() as $bottomBanner)
                    <div class="col-lg-6 col-md-6 text-right">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="{{ $bottomBanner->button_link }}"><img
                                    src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $bottomBanner->image) }}"
                                    alt="" /></a>
                            <div
                                class="{{ $loop->last ? 'banner-content banner-position-4' : 'banner-content banner-position-3' }}">
                                <h3>{{ $bottomBanner->title }}</h3>
                                <h2>{{ $bottomBanner->text }}</h2>
                                <a href="{{ $bottomBanner->button_link }}">{{ $bottomBanner->button_text }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
