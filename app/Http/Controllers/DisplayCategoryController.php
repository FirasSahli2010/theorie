<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Categories;
use App\Models\Meun;
use App\Models\Posts;

use App\Models\Languages;

use Illuminate\Http\Request;

class DisplayCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $currentLanguage = Languages::where('code', '=', App::getLocale())->first();

      $categories = Categories::has('Posts')
                      ->where('language','=',$currentLanguage->id)
                      ->where('id', '!=', 1)
                      ->where('shw','=','Y')
                      ->orderBy('updated_at', 'desc')
                      ->paginate(10);

      return view('category.index',compact('categories'));
    }

    public function listTopic($slug='')
    {
      $currentLanguage = Languages::where('code', '=', App::getLocale())->first();

      $category = Categories::where('slug','=',$slug)->first();

      $categoryPosts = $category->posts()
                                ->orderBy('updated_at','desc')
                                ->take(4)
                                ->get();

      return view('category.display',compact('category', 'categoryPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
