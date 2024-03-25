@extends('admin.layouts.admin')

@section('title')
    show roles
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">نقش : {{ $role->display_name }} </h5>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="display_name">نام نمایشی</label>
                    <input class="form-control" type="text" disabled value="{{ $role->display_name }}">
                </div>

                <div class="form-group col-md-4">
                    <label for="name">نام</label>
                    <input class="form-control" type="text" disabled value="{{ $role->name }}">
                </div>

                <div class="form-group col-md-12 mt-3">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-1" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        مجوز های دسترسی
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body row">
                                    @foreach ($role->permissions as $permission)
                                        <div class="col-md-3">
                                            <span>{{ $permission->display_name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </div>
    </div>
@endsection
