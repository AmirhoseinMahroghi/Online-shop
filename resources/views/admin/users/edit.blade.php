@extends('admin.layouts.admin')

@section('title')
    edit users
@endsection

@section('script')
    <script>
        $('#image').change(function() {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
@endsection

@section('content')
    {{-- Style Input Image --}}
    <style>
        .custom-file-label::after {
            content: "فایل";
        }

        .custom-file-label::after {
            right: unset;
            left: 0;
            border-left: unset;
            border-right: inherit;
            border-radius: 0.35rem 0 0 0.35rem;
        }
    </style>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش کاربر : {{ $user->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">نام کاربر</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">ایمیل</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cellphone">شماره تلفن</label>
                        <input class="form-control @error('cellphone') is-invalid @enderror" type="text" name="cellphone"
                            id="cellphone" value="{{ $user->cellphone }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="avater">آواتار</label>
                        <div class="custom-file">
                            <input type="file" name="avater"
                                class="custom-file-input @error('avater') is-invalid @enderror" id="image">
                            <label for="avater" class="custom-file-label">انتخاب فایل</label>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="role">انتخاب نقش</label>
                        <select class="form-control" name="role" id="role">
                            <option></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $role->display_name }}</option>
                            @endforeach
                        </select>
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
                                                    id="defaultCheck-{{ $permission->id }}"
                                                    {{ in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
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
                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
