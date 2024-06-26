<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.products.create', compact('brands', 'tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'is_active' => 'required',
            'tag_ids' => 'required',
            'description' => 'required',
            'primary_image' => 'required|mimes:jpg,jpeg,png,svg,PNG,JPG',
            'images' => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,svg,PNG,JPG',
            'category_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.*' => 'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ]);

        try {
            DB::beginTransaction();

            $ProductimageController = new ProductimageController;
            $fileNameImages = $ProductimageController->upload($request->primary_image, $request->images);

            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'primary_image' => $fileNameImages['fileNamePrimaryImage'],
                'description' => $request->description,
                'is_active' => $request->is_active,
                'delivery_amount' => $request->delivery_amount,
                'delivery_amount_per_product' => $request->delivery_amount_per_product
            ]);

            foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $fileNameImage
                ]);
            }

            $productAttributeController = new ProductAttributeController;
            $productAttributeController->store($request->attribute_ids, $product);

            $category = Category::find($request->category_id);
            $productVariationController = new ProductVariationController;
            $productVariationController->store($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);

            $product->tags()->attach($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', ' محصول با موفقیت ایجاد گردید');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productattributes = $product->attributes()->with('attribute')->get();
        $productvariations = $product->variations;
        $productimages = $product->images;
        return view('admin.products.show', compact('product', 'productattributes', 'productvariations', 'productimages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $brands = Brand::all();
        $productattributes = $product->attributes()->with('attribute')->get();
        $productvariations = $product->variations;

        return view('admin.products.edit', compact('product', 'tags', 'brands', 'productattributes', 'productvariations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'is_active' => 'required',
            'tag_ids' => 'required',
            'tag_ids.*' => 'exists:tags,id',
            'description' => 'required',
            'attribute_values' => 'required',
            'attribute_values.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.price' => 'required|integer',
            'variation_values.*.quantity' => 'required|integer',
            'variation_values.*.sale_price' => 'nullable|integer',
            'variation_values.*.date_on_sale_from' => 'nullable',
            'variation_values.*.date_on_sale_to' => 'nullable',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ]);

        try {
            DB::beginTransaction();

            $product->update([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'delivery_amount' => $request->delivery_amount,
                'delivery_amount_per_product' => $request->delivery_amount_per_product
            ]);

            $productAttributeController = new ProductAttributeController;
            $productAttributeController->update($request->attribute_values);

            $productVariationController = new ProductVariationController;
            $productVariationController->update($request->variation_values);
           // dd($request->variation_values);

            $product->tags()->sync($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', ' محصول با موفقیت ویرایش گردید');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editCategory(Request $request, Product $product)
    {
        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('admin.products.edit_category', compact('product', 'categories'));
    }

    public function updateCategory(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.*' => 'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer',
        ]);

        try {
            DB::beginTransaction();

            $product->update([
                'category_id' => $request->category_id
            ]);

            $productAttributeController = new ProductAttributeController;
            $productAttributeController->change($request->attribute_ids, $product);

            $category = Category::find($request->category_id);
            $productVariationController = new ProductVariationController;
            $productVariationController->change($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در دسته بندی محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', ' دسته بندی محصول با موفقیت ویرایش گردید');
        return redirect()->route('admin.products.index');
    }
}
