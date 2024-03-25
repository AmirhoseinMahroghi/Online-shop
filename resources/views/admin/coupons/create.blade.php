@extends('admin.layouts.admin')

@section('title')
    create coupon
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
                <h5 class="font-weight-bold">ایجاد کوپن</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.coupons.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="code">کد</label>
                        <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                            id="code" value="{{ old('code') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="type">نوع</label>
                        <select class="form-control" name="type" id="type">
                            <option value="amount">مبلغی</option>
                            <option value="percentage">درصدی</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="amount">مبلغ</label>
                        <input class="form-control @error('amount') is-invalid @enderror" type="text" name="amount"
                            id="amount" value="{{ old('amount') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="percentage">درصد</label>
                        <input class="form-control @error('percentage') is-invalid @enderror" type="text"
                            name="percentage" id="percentage" value="{{ old('percentage') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="max_percentage_amount">حداکثر مبلغ برای نوع درصدی</label>
                        <input class="form-control @error('max_percentage_amount') is-invalid @enderror" type="text"
                            name="max_percentage_amount" id="max_percentage_amount"
                            value="{{ old('max_percentage_amount') }}">
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
                                name="expired_at" id="expireInput">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ثبت</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
