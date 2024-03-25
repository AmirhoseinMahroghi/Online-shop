<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

class HomeController extends Controller
{
    public function index()
    {
        // SEO
        SEOTools::setTitle('صفحه اصلی');
        SEOTools::setDescription('صفحه اصلی وب سایت');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');

        SEOTools::opengraph()->setUrl(route('home.index'));

        SEOTools::twitter()->setSite('@Mahroghi');

        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');


        session()->forget('coupon');
        $sliders = Banner::where('type', 'slider')->where('is_active', 1)->orderBy('priority')->get();
        $indexTopBanners = Banner::where('type', 'index-top')->where('is_active', 1)->orderBy('priority')->get();
        $indexBottomBanners = Banner::where('type', 'index-bottom')->where('is_active', 1)->orderBy('priority')->get();
        $products = Product::where('is_active', 1)->get()->take(5);
        return view('home.index', compact('sliders', 'indexTopBanners', 'indexBottomBanners', 'products'));
    }

    public function aboutUs()
    {
          // SEO
          SEOTools::setTitle('درباره ما');
          SEOTools::setDescription(' صفحه درباره ما وب سایت');
          SEOTools::setCanonical('https://codecasts.com.br/lesson');

          SEOTools::opengraph()->setUrl(route('home.about_us'));

          SEOTools::twitter()->setSite('@Mahroghi');

          SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');


        $BottomBanners = Banner::where('type', 'index-bottom')->where('is_active', 1)->orderBy('priority')->get();
        return view('home.about_us', compact('BottomBanners'));
    }

    public function contactUs()
    {
          // SEO
          SEOTools::setTitle('تماس با ما');
          SEOTools::setDescription('صفحه تماس با ما وب سایت');
          SEOTools::setCanonical('https://codecasts.com.br/lesson');

          SEOTools::opengraph()->setUrl(route('home.contact_us'));

          SEOTools::twitter()->setSite('@Mahroghi');

          SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');


        $setting = Setting::findOrFail(1);
        return view('home.contact_us', compact('setting'));
    }

    public function contactUsForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|min:4|max:100',
            'text' => 'required|string|min:4|max:3000',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')],
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,
        ]);

        alert()->success('باتشکر', 'پیام شما با موفقیت ثیت شد')->persistent('حله');
        return redirect()->back();
    }
}
