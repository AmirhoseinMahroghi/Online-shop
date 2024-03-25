@extends('admin.layouts.admin')

@section('title')
    create roles
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد نقش</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.roles.store') }}" method="POST">
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

                    <div class="form-group col-md-12 mt-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header p-1" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-right" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            مجوز های دسترسی
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body row">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check col-md-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="{{ $permission->name }}" value="{{ $permission->name }}"
                                                    id="defaultCheck-{{ $permission->id }}">
                                                <label class="form-check-label mr-4"
                                                    for="defaultCheck-{{ $permission->id }}">
                                                    {{ $permission->display_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ثبت</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
