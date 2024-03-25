@extends('admin.layouts.admin')

@section('title')
    create category
@endsection

@section('script')
    <script>
        $('#attribute_ids').on('changed.bs.select', function() {
            let attributesSelected = $(this).val();
            let attributes = @json($attributes);

            let attributeForFilter = [];

            attributes.map((attribute) => {
                $.each(attributesSelected , function(i,element){
                    if( attribute.id == element ){
                        attributeForFilter.push(attribute);
                    }
                });
            });

            $("#attribute_is_filter_ids").find("option").remove();
            $("#variation_id").find("option").remove();
            attributeForFilter.forEach((element)=>{
                let attributeFilterOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                let variationOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                $("#attribute_is_filter_ids").append(attributeFilterOption);
                $("#attribute_is_filter_ids").selectpicker('refresh');

                $("#variation_id").append(variationOption);
                $("#variation_id").selectpicker('refresh');
            });

        });
    </script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد دسته بندی</h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام دسته بندی</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="slug">نام انگلیسی</label>
                        <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug"
                            id="slug" value="{{ old('slug') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="parent_id">والد</label>
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="0">بدون والد</option>
                            @foreach ($parentcategories as $parentcategory)
                                <option value="{{ $parentcategory->id }}">{{ $parentcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_ids">ویژگی</label>
                        <select class="selectpicker @error('attribute_ids') is-invalid @enderror" title="انتخاب ویژگی" id="attribute_ids" name="attribute_ids[]" multiple
                            data-live-search="true">
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3 mr-5">
                        <label for="attribute_is_filter_ids">انتخاب ویژگی های قابل فیلتر</label>
                        <select class="selectpicker @error('attribute_is_filter_ids') is-invalid @enderror" id="attribute_is_filter_ids" title="انتخاب ویژگی"
                            name="attribute_is_filter_ids[]" multiple data-live-search="true">
                        </select>
                    </div>

                    <div class="form-group col-md-3 mr-5">
                        <label for="variation_id">انتخاب ویژگی متغیر</label>
                        <select class="selectpicker @error('variation_id') is-invalid @enderror" title="انتخاب متغیر" name="variation_id" data-live-search="true"
                            id="variation_id">
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="icon">آیکون</label>
                        <input class="form-control" id="icon" name="icon" type="text" value="{{ old('icon') }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-outline-primary mt-5">ثبت</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
