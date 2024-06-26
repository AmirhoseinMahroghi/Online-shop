<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {

        $attributes = $category->attributes()->where('is_filter', 1)->with('values')->get();
        $variation = $category->attributes()->where('is_variation', 1)->with('Variationvalues')->first();

        $products = $category->products()->filter()->search()->paginate(9);

        return view('home.categories.show', compact('category', 'attributes', 'variation', 'products'));
    }
}
