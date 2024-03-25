@extends('admin.layouts.admin')

@section('title')
    index users
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست کاربران ({{ $users->total() }})</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>آواتار</th>
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>عضویت از طریق</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th>
                                    {{ $users->firstItem() + $key }}
                                </th>
                                <th>
                                    <img width="40"
                                        src="{{ $user->avater == null ? asset('home/assets/user.png') : url(env('USERS_IMAGES_UPLOAD_PATH') . $user->avater) }}"
                                        alt="">
                                </th>
                                <th>
                                    {{ $user->name == null ? '__' : $user->name }}
                                </th>
                                <th>
                                    {{ $user->email == null ? '__' : $user->email }}
                                </th>
                                <th>
                                    {{ $user->cellphone == null ? '__' : $user->cellphone }}
                                </th>
                                <th>
                                    {{ $user->provider_name == null ? 'پیش فرض' : $user->provider_name }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="{{ route('admin.users.edit', $user->id) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
