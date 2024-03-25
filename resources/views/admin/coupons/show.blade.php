@extends('admin.layouts.admin')

@section('title')
    show coupon
@endsection

@section('script')
    <script>
        $('#expireDate').MdPersianDateTimePicker({
            targetTextSelector: '#expireInput',
            englishNumber: true,
            enableTimePicker: true,
            textFormat: 'yyyy-MM-dd HH:mm:ss',
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">کوپن : {{ $coupon->name }}</h5>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $coupon->name }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>کد</label>
                    <input class="form-control" type="text" value="{{ $coupon->code }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>نوع</label>
                    <select class="form-control" disabled>
                        <option {{ $coupon->type == 'مبلغی' ? 'selected' : ''  }}>مبلغی</option>
                        <option {{ $coupon->type == 'درصدی' ? 'selected' : ''  }}>درصدی</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>مبلغ</label>
                    <input class="form-control" type="text" value="{{ $coupon->amount }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>درصد</label>
                    <input class="form-control" type="text" value="{{ $coupon->percentage }}" disabled>
                </div>

                <div class="form-group col-md-4">
                    <label>حداکثر مبلغ برای نوع درصدی</label>
                    <input class="form-control" type="text" value="{{ $coupon->max_percentage_amount }}" disabled>
                </div>

                <div class="form-group col-md-4">
                    <label for="max_percentage_amount">تاریخ انقضا</label>
                    <div class="input-group">
                        <div class="input-group-prepend order-2">
                            <span class="input-group-text" id="expireDate">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" value="{{ verta($coupon->expired_at) }}" disabled>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label>توضیحات</label>
                    <textarea class="form-control" disabled>{{ $coupon->description }}</textarea>
                </div>
            </div>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5">بازگشت</a>
        </div>
    </div>
@endsection
