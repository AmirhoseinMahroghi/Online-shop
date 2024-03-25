@extends('admin.layouts.admin')

@section('title')
    create permissions
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد مجوز</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.permissions.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="display_name">نام نمایشی</label>
                        <input class="form-control @error('display_name') is-invalid @enderror" type="text"
                            name="display_name" id="display_name" value="{{ old('display_name') }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="name">نام</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>

                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ثبت</button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
