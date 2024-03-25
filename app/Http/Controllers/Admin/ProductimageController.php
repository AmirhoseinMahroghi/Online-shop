<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductimageController extends Controller
{
    public function upload($primary_image, $images)
    {
        $fileNamePrimaryImage = genrateFileName($primary_image->getClientOriginalName());
        $primary_image->move(public_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);

        $fileNameImages = [];
        foreach ($images as $image) {
            $fileNameImage = genrateFileName($image->getClientOriginalName());
            $image->move(public_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNameImage);

            array_push($fileNameImages, $fileNameImage);
        }
        return ['fileNamePrimaryImage' => $fileNamePrimaryImage, 'fileNameImages' => $fileNameImages];
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit_images', compact('product'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'image_id' => 'required|exists:product_images,id'
        ]);

        ProductImage::destroy($request->image_id);

        alert()->success('باتشکر', ' تصویر محصول با موفقیت حذف گردید');
        return redirect()->back();
    }

    public function setPrimary(Request $request, Product $product)
    {
        $request->validate([
            'image_id' => 'required|exists:product_images,id'
        ]);

        $productImage = ProductImage::findOrFail($request->image_id);
        $product->update([
            'primary_image' => $productImage->image
        ]);

        alert()->success('باتشکر', ' ویرایش تصویر اصلی با موفقیت انجام شد');
        return redirect()->back();
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'primary_image' => 'nullable|mimes:jpg,jpeg,png,svg,PNG,JPG',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,svg,PNG,JPG'
        ]);

        if ($request->primary_image == null && $request->images == null) {
            return redirect()->back()->withErrors(['msg' => 'تصویر یا تصاویر محصول الزامی است']);
        }

        try {
            DB::beginTransaction();

            if ($request->has('primary_image')) {

                $fileNamePrimaryImage = genrateFileName($request->primary_image->getClientOriginalName());
                $request->primary_image->move(public_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNamePrimaryImage);

                $product->update([
                    'primary_image' => $fileNamePrimaryImage
                ]);
            }

            if ($request->has('images')) {

                foreach ($request->images as $image) {
                    $fileNameImage = genrateFileName($image->getClientOriginalName());
                    $image->move(public_path(env('PRODUCT_IMAGES_UPLOAD_PATH')), $fileNameImage);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $fileNameImage
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در اپلود تصویر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', ' ویرایش تصویر اصلی با موفقیت انجام شد');
        return redirect()->back();
    }
}
