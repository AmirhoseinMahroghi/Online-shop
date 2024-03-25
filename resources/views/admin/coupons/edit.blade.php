@extends('admin.layouts.admin')

@section('title')
    edit coupon
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
                <h5 class="font-weight-bold">ویرایش کوپن : {{ $coupon->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ $coupon->name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="code">کد</label>
                        <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                            id="code" value="{{ $coupon->code }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="type">نوع</label>
                        <select class="form-control" name="type" id="type">
                            <option value="amount" {{ $coupon->type == 'مبلغی' ? 'selected' : '' }}>مبلغی</option>
                            <option value="percentage" {{ $coupon->type == 'درصدی' ? 'selected' : '' }}>درصدی</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="amount">مبلغ</label>
                        <input class="form-control @error('amount') is-invalid @enderror" type="text" name="amount"
                            id="amount" value="{{ $coupon->amount }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="percentage">درصد</label>
                        <input class="form-control @error('percentage') is-invalid @enderror" type="text"
                            name="percentage" id="percentage" value="{{ $coupon->percentage }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="max_percentage_amount">حداکثر مبلغ برای نوع درصدی</label>
                        <input class="form-control @error('max_percentage_amount') is-invalid @enderror" type="text"
                            name="max_percentage_amount" id="max_percentage_amount"
                            value="{{ $coupon->max_percentage_amount }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="max_percentage_amount">تاریخ انقضا</label>
                        <div class="input-group">
                            <div class="input-group-prepend order-2">
                                <span class="input-group-text" id="expireDate">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('expired_at') is-invalid @enderror"
                                name="expired_at" id="expireInput" value="{{ verta($coupon->expired_at) }}">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description">{{ $coupon->description }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-4">ویرایش</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-4 mr-3">بازگشت</a>

            </form>
            <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="float: left" class="btn btn-danger">حذف کوپن</button>
            </form>
        </div>
    </div>
@endsection
