@extends('admin.layouts.admin')

@section('title')
    edit product category
@endsection

@section('script')
    <script>
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
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش دسته بندی محصول : {{ $product->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.products.update.category', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">

                    {{--  Category & Attribute Section --}}
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-3">
                                <label for="category_id">دسته بندی</label>
                                <select class="selectpicker @error('category_id') is-invalid @enderror"
                                    title="انتخاب دسته بندی" name="category_id" data-live-search="true" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->name }} -
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
                </div>

                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
