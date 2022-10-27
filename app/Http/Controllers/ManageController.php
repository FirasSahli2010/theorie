<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\Pages;
use App\Models\product_category;
use App\Models\Product;



use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Controllers\LanguagesController;

class ManageController extends Controller
{

  private LanguagesController $langController;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->langController = new LanguagesController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $categories = Categories::where('id', '!=', 1)->orderBy('updated_at', 'desc') ->limit(5)->get();
      $posts = Posts::where('shw', '=', 'Y')
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)
                    ->get();

      $dispbled_posts = Posts::where('shw', '=', 'N')
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)
                    ->get();

      $pages = Pages::where('shw', '=', 'Y')
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)
                    ->get();

      $products = Product::orderBy('updated_at', 'desc')->limit(5)->get();

      $product_categories = product_category::where('id', '!=', 1)->orderBy('updated_at', 'desc')->limit(5)->get();

      $langListAsJSON = $this->langController->get_language_list();


      return view('manage.dashboard',compact('categories', 'pages', 'posts', 'dispbled_posts', 'products', 'product_categories'));
    }
}
