<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\LanguagesController;

use App\Models\product_category;
use Illuminate\Http\Request;


use Illuminate\Support\Str;

class ProductIndexController extends Controller
{
  private LanguagesController $langController;

  public function __construct()
  {
      $this->middleware('auth');
      $this->langController = new LanguagesController();
  }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $filters = product_category::sortable()->withTrashed()->where('id', '!=', 1)->where('parent_category', '=', '1')->orderBy('updated_at', 'desc')->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.product_filters.index',compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @return \Illuminate\Http\Response
     */
    public function create(ProductCategoryController $productCategoryController)
    {
      //$data = product_category::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product_filters.add',compact('langArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'title' => ['required', 'unique:product_category', 'max:255']
        ]);

      $filter = new product_category();
      $filter->title = $request['title'];
      $filter->language = $request['lang'];
      $filter->parent_category = 1;
      $filter->slug = Str::slug($filter->title);
      $filter->desc = (!$request['desc'])?'':$request['desc'];

      if ($request['publish']) {
        $filter->shw = 'Y';
      }

      $filter->save();
      return redirect('/admin/product_index/')->with('message', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategoryController $productCategoryController, product_category $product_category)
    {
        return view('admin.product_index.detail', ['category' => product_category::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $filter = product_category::findorfail($id); // fetch the category

      // $data = product_category::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product_filters.edit',compact('filter', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $filter = product_category::findorfail($id);
      $filter->title = $request['title'];
      $filter->parent_category = 1;
      $filter->slug = Str::slug($filter->title);
      $filter->desc = (!$request['desc'])?'':$request['desc'];
      $filter->language = $request['lang'];

      if ($request['publish']) {
        $filter->shw = 'Y';
      }

      if ($request['draft']) {
        $filter->shw = 'N';
      }

      $filter->save();
      return redirect('/admin/product_index/')->with('message', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Controllers\ProductCategoryController  $productCategoryController
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $filter = product_category::findorfail($id); // fetch the category
      $filter->shw = 'N';
      $filter->save();
      $result = $filter->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/product_index/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/product_index/')->with('message', 'Delete failed!');
        }
    }

    public function enable($id)
    {

      $filter = product_category::findorfail($id);

      $filter->shw ='Y';

      $filter->save();
      return redirect('admin/product_index')->with('message', 'Category published!');
    }

    public function disable($id)
    {

      $filter = product_category::findorfail($id);

      $filter->shw ='N';

      $filter->save();
      return redirect('admin/product_index')->with('message', 'Category un-published!');
    }

    public function permdelete($id) {
      $filter = product_category::withTrashed()
                                ->where('id', $id)
                                ->first(); // fetch the category

      $result = $filter->forceDelete();; //force delete the fetched category

      if ($result) {
            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/product_index/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/product_index/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function restore($id) {
      $filter = product_category::onlyTrashed()->find($id);

        if (!is_null($filter)) {

          $filter->save();
            $filter->restore();
            // return view('admin.category.detail', ['category' => Categories::findOrFail($id)]);
              return redirect('/admin/product_index/')->with('message', 'Record restored!');
        } else {

            return redirect('/admin/product_index/')->with('message', 'Restore failed!');
        }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $filter = product_category::findorfail($id); // fetch the category

          $filter->save();
          $result = $filter->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/product_index/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/product_index/')->with('message','Records deleted!');
    }
}
