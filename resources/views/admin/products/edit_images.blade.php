@extends('admin.layouts.admin')

@section('title')
    edit product images
@endsection

@section('script')
    <script>
        $('#primary_image').change(function() {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#images').change(function() {

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
                <h5 class="font-weight-bold">ویرایش تصاویر مصحول : {{ $product->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')

            {{-- Show Product Primary Image --}}

            <div class="row">
                <div class="col-12 col-md-12 mb-5">
                    <h5>تصویر اصلی : </h5>
                </div>
                <div class="col-12 col-md-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                            alt="{{ $product->name }}">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-12 col-md-12 mb-5">
                    <h5> تصاویر : </h5>
                </div>

                @foreach ($product->images as $productimage)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top"
                                src="{{ url(env('PRODUCT_IMAGES_UPLOAD_PATH') . $productimage->image) }}"
                                alt="{{ $product->name }}">

                            <div class="card-body text-center">
                                <form action="{{ route('admin.products.image.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $productimage->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm mb-3">حذف</button>
                                </form>

                                <form action="{{ route('admin.products.image.set_primary', $product->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $productimage->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3">انتخاب به عنوان تصویر
                                        اصلی</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr>

            <form action="{{ route('admin.products.image.add', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="primary_image">انتخاب تصویر اصلی</label>
                        <div class="custom-file">
                            <input type="file" name="primary_image"
                                class="custom-file-input @error('primary_image') is-invalid @enderror" id="primary_image">
                            <label for="primary_image" class="custom-file-label">انتخاب فایل</label>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="images">انتخاب تصاویر </label>
                        <div class="custom-file">
                            <input type="file" name="images[]" multiple
                                class="custom-file-input @error('images') is-invalid @enderror" id="images">
                            <label for="images" class="custom-file-label">انتخاب فایل ها</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
