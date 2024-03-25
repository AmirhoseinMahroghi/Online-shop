@extends('admin.layouts.admin')

@section('title')
    create product
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


        $('#attributesContainer').hide();
        $('#category_id').on('changed.bs.select', function() {
            let categoryId = $(this).val();
            $.get(`{{ url('/admin-panel/management/category-attributes/${categoryId}') }}`, function(response,
                status) {
                if (status == 'success') {

                    $('#attributesContainer').fadeIn();

                    // Empty Atrribute Container
                    $('#attibutesRow').find('div').remove();

                    // Create and Append Attributes Input
                    response.attributes.forEach(attribute => {
                        let attributeFormGroup = $('<div/>', {
                            class: 'form-group col-md-3'
                        });
                        attributeFormGroup.append($('<lable/>', {
                            for: attribute.name,
                            text: attribute.name
                        }));
                        attributeFormGroup.append($('<input/>', {
                            type: 'text',
                            class: 'form-control',
                            id: attribute.name,
                            name: `attribute_ids[${attribute.id}]`
                        }));

                        $('#attibutesRow').append(attributeFormGroup);
                    });

                    $('#variationName').text(response.variation.name);

                } else {
                    alert('مشکل در دریافت لیست ویژگی ها');
                }
            }).fail(function() {
                alert('مشکل در دریافت لیست ویژگی ها');
            })

        });

        $("#czContainer").czMore();
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
                <h5 class="font-weight-bold">ایجاد محصول</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام محصول</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="brand_id">برند</label>
                        <select class="selectpicker @error('brand_id') is-invalid @enderror" title="انتخاب برند"
                            name="brand_id" data-live-search="true" id="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2 mr-md-4">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tag_ids">تگ</label>
                        <select class="selectpicker @error('tag_ids') is-invalid @enderror" title="انتخاب تگ" id="tag_ids"
                            name="tag_ids[]" multiple data-live-search="true">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    </div>

                    {{--  Product Image Section --}}

                    <div class="col-md-12">
                        <hr>
                        <p>تصاویر محصول : </p>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="primary_image">انتخاب تصویر اصلی</label>
                        <div class="custom-file">
                            <input type="file" name="primary_image" class="custom-file-input @error('primary_image') is-invalid @enderror" id="primary_image">
                            <label for="primary_image" class="custom-file-label">انتخاب فایل</label>
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="images">انتخاب تصاویر </label>
                        <div class="custom-file">
                            <input type="file" name="images[]" multiple class="custom-file-input @error('images') is-invalid @enderror" id="images">
                            <label for="images" class="custom-file-label">انتخاب فایل ها</label>
                        </div>
                    </div>

                    {{--  Category & Attribute Section --}}

                    <div class="col-md-12">
                        <hr>
                        <p>دسته بندی و ویژگی ها : </p>
                    </div>

                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-3">
                                <label for="category_id">دسته بندی</label>
                                <select class="selectpicker @error('category_id') is-invalid @enderror"
                                    title="انتخاب دسته بندی" name="category_id" data-live-search="true" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} -
                                            {{ $category->parent->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="attributesContainer" class="col-md-12">
                        <div id="attibutesRow" class="row"></div>
                        <div class="col-md-12">
                            <hr>
                            <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold" id="variationName"></span> :
                            </p>
                        </div>

                        <div id="czContainer">
                            <div id="first">
                                <div class="recordset">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>نام</label>
                                            <input class="form-control" type="text" name="variation_values[value][]">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>قیمت</label>
                                            <input class="form-control" type="text" name="variation_values[price][]">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>تعداد</label>
                                            <input class="form-control" type="text" name="variation_values[quantity][]">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>شناسه انبار</label>
                                            <input class="form-control" type="text" name="variation_values[sku][]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                      {{-- Delivery Section --}}

                      <div class="col-md-12">
                        <hr>
                        <p>هزینه ارسال : </p>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="delivery_amount">هزینه ارسال</label>
                        <input class="form-control @error('delivery_amount') is-invalid @enderror" type="text" name="delivery_amount" id="delivery_amount" value="{{ old('delivery_amount') }}">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                        <input class="form-control @error('delivery_amount_per_product') is-invalid @enderror" type="text" name="delivery_amount_per_product" id="delivery_amount_per_product" value="{{ old('delivery_amount_per_product') }}">
                    </div>

                </div>

                <button type="submit" class="btn btn-outline-primary mt-5">ثبت</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
