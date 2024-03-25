@extends('admin.layouts.admin')

@section('title')
    edit brands
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش برند : {{ $brand->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.brands.update',$brand->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام برند</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ $brand->name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="0" {{ $brand->getRawOriginal('is_active') ? 'selected' : '' }}>غیرفعال</option>
                            <option value="1" {{ $brand->getRawOriginal('is_active') ? 'selected' : '' }}>فعال</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
