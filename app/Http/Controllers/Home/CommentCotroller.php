<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentCotroller extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            'rate' => 'required|digits_between:0,5'
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#comment')->withErrors($validator);
        }

        if (auth()->check()) {

            try {
                DB::beginTransaction();

                Comment::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'text' => $request->text
                ]);

                if ($product->rates()->where('user_id', auth()->id())->exists()) {
                    $productRate = $product->rates()->where('user_id', auth()->id())->first();
                    $productRate->update([
                        'rate' => $request->rate
                    ]);
                } else {
                    ProductRate::create([
                        'user_id' => auth()->id(),
                        'product_id' => $product->id,
                        'rate' => $request->rate
                    ]);
                }

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                alert()->error('مشکل در ثبت نظر', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }

            alert()->success('باتشکر', 'نظر شما موفقیت ثبت گردید. بعد از تایید مدیران در سایت منتشر میشود')->persistent('حله');
            return redirect()->back();

        } else {
            alert()->warning('دقت کنید', 'برای ثبت نظر نیاز وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

    public function UserProfile()
    {
        $comments = Comment::where('user_id' , auth()->id())->where('approved', 1)->get();

        return view('home.users_profile.comments',compact('comments'));
    }
}
