@extends('admin.layouts.admin')

@section('title')
    edit product
@endsection

@section('script')
    <script>
        let variations = @json($productvariations);
        variations.forEach(variation => {
            $(`#variationDateOnSaleFrom-${variation.id}`).MdPersianDateTimePicker({
                targetTextSelector: `#variationInputDateOnSaleFrom-${variation.id}`,
                englishNumber: true,
                enableTimePicker: true,
                textFormat: 'yyyy-MM-dd HH:mm:ss',
            });

            $(`#variationDateOnSaleTo-${variation.id}`).MdPersianDateTimePicker({
                targetTextSelector: `#variationInputDateOnSaleTo-${variation.id}`,
                englishNumber: true,
                enableTimePicker: true,
                textFormat: 'yyyy-MM-dd HH:mm:ss',
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش محصول : {{ $product->name }}</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام محصول</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ $product->name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="brand_id">برند</label>
                        <select class="selectpicker @error('brand_id') is-invalid @enderror" title="انتخاب برند"
                            name="brand_id" data-live-search="true" id="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2 mr-md-4">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="1" {{ $product->getRawOriginal('is_active') ? 'selected' : '' }}>فعال
                            </option>
                            <option value="0" {{ $product->getRawOriginal('is_active') ? '' : 'selected' }}>غیرفعال
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tag_ids">تگ</label>
                        <select class="selectpicker @error('tag_ids') is-invalid @enderror" title="انتخاب تگ" id="tag_ids"
                            name="tag_ids[]" multiple data-live-search="true">
                            @php
                                $productTagIds = $product
                                    ->tags()
                                    ->pluck('id')
                                    ->toArray();
                            @endphp
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }}>{{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                    </div>

                    {{-- Delivery Section --}}

                    <div class="col-md-12">
                        <hr>
                        <p>هزینه ارسال : </p>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="delivery_amount">هزینه ارسال</label>
                        <input class="form-control @error('delivery_amount') is-invalid @enderror" type="text"
                            name="delivery_amount" id="delivery_amount" value="{{ $product->delivery_amount }}">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                        <input class="form-control @error('delivery_amount_per_product') is-invalid @enderror"
                            type="text" name="delivery_amount_per_product" id="delivery_amount_per_product"
                            value="{{ $product->delivery_amount_per_product }}">
                    </div>

                    {{-- Attributes & Variation Section --}}

                    <div class="col-md-12">
                        <hr>
                        <p> ویژگی ها : </p>
                    </div>

                    @foreach ($productattributes as $productattribute)
                        <div class="form-group col-md-3">
                            <label>{{ $productattribute->attribute->name }}</label>
                            <input class="form-control" type="text" name="attribute_values[{{ $productattribute->id }}]"
                                value="{{ $productattribute->value }}">
                        </div>
                    @endforeach

                    @foreach ($productvariations as $variation)
                        <div class="col-md-12">
                            <hr>
                            <div class="d-flex">
                                <p class="mb-0"> قیمت و موجودی برای متغیر ( {{ $variation->value }} ) : </p>
                                <p class="mb-0 mr-3">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapse-{{ $variation->id }}">
                                        نمایش
                                    </button>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="collapse mt-2" id="collapse-{{ $variation->id }}">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label> قیمت </label>
                                            <input type="text" name="variation_values[{{ $variation->id }}][price]"
                                                class="form-control" value="{{ $variation->price }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label> تعداد </label>
                                            <input type="text" name="variation_values[{{ $variation->id }}][quantity]"
                                                class="form-control" value="{{ $variation->quantity }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label> sku </label>
                                            <input type="text" name="variation_values[{{ $variation->id }}][sku]"
                                                class="form-control" value="{{ $variation->sku }}">
                                        </div>

                                        {{-- Sale Section --}}
                                        <div class="col-md-12">
                                            <p> حراج : </p>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label> قیمت حراجی </label>
                                            <input type="text" value="{{ $variation->sale_price }}"
                                                name="variation_values[{{ $variation->id }}][sale_price]"
                                                class="form-control">
                                        </div>

                                        <div class="from-group col-md-4">
                                            <label> تاریخ شروع حراجی </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend order-2">
                                                    <span class="input-group-text" id="variationDateOnSaleFrom-{{ $variation->id }}">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ $variation->date_on_sale_from == null ? null : verta($variation->date_on_sale_from) }}"
                                                    name="variation_values[{{ $variation->id }}][date_on_sale_from]"
                                                    id="variationInputDateOnSaleFrom-{{ $variation->id }}">
                                            </div>
                                        </div>

                                        <div class="from-group col-md-4">
                                            <label> تاریخ پایان حراجی </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend order-2">
                                                    <span class="input-group-text" id="variationDateOnSaleTo-{{ $variation->id }}">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ $variation->date_on_sale_to == null ? null : verta($variation->date_on_sale_to) }}"
                                                    name="variation_values[{{ $variation->id }}][date_on_sale_to]"
                                                    id="variationInputDateOnSaleTo-{{ $variation->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ویرایش</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
