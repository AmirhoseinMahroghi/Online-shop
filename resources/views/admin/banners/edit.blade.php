@extends('admin.layouts.admin')

@section('title')
    edit banner
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
                <h5 class="font-weight-bold">ویرایش بنر : {{ $banner->image }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row justify-content-center mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                alt="{{ $banner->image }}">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="image">انتخاب تصویر</label>
                        <div class="custom-file">
                            <input type="file" name="image"
                                class="custom-file-input @error('image') is-invalid @enderror" id="image">
                            <label for="image" class="custom-file-label">انتخاب فایل</label>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="title">عنوان</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="{{ $banner->title }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="text">متن توضیحات</label>
                        <textarea class="form-control" name="text" id="text">{{ $banner->text }}</textarea>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="priority">اولویت</label>
                        <input class="form-control @error('priority') is-invalid @enderror" type="number" name="priority"
                            id="priority" value="{{ $banner->priority }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="1" {{ $banner->getRawOriginal('is_active') ? 'selected' : '' }}>فعال
                            </option>
                            <option value="0" {{ $banner->getRawOriginal('is_active') ? '' : 'selected' }}>غیرفعال
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="type">نوع بنر</label>
                        <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
                            id="type" value="{{ $banner->type }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="button_text">متن دکمه</label>
                        <input class="form-control" type="text" name="button_text" id="button_text"
                            value="{{ $banner->button_text }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="button_link">لینک دکمه</label>
                        <input class="form-control" type="text" name="button_link" id="button_link"
                            value="{{ $banner->button_link }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="button_icon">ایکون دکمه</label>
                        <input class="form-control" type="text" name="button_icon" id="button_icon"
                            value="{{ $banner->button_icon }}">
                    </div>

                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
