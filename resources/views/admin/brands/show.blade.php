@extends('admin.layouts.admin')

@section('title')
    show brand
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">برند : {{ $brand->name }}</h5>
            </div>
            <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>نام برند</label>
                        <input class="form-control" type="text" value="{{ $brand->name }}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label>وضعیت</label>
                        <input class="form-control" type="text" value="{{ $brand->is_active }}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label>تاریخ ایجاد</label>
                        <input class="form-control" type="text" value="{{ verta($brand->created_at)}}" disabled>
                    </div>
                </div>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-dark mt-5">بازگشت</a>
        </div>
    </div>
@endsection
