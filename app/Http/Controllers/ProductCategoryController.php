<?php

namespace App\Http\Controllers;

use App\Models\product_category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Controllers\LanguagesController;

class ProductCategoryController extends Controller
{
  private LanguagesController $langController;

  public function __construct()
  {
      $this->middleware('auth');
      $this->langController = new LanguagesController();
  }

    public function index()
    {
      $categories = product_category::sortable()->withTrashed()->where('id', '!=', 1)->where('parent_category', '<>', '1')->orderBy('updated_at', 'desc')->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.product_category.index',compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product_category.detail', ['category' => product_category::findOrFail($id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $filters = product_category::where('id', '!=', 1, )->where('parent_category', '=', '1')->get();
      $data = product_category::where('id', '!=', 1, )->where('parent_category', '<>', '1')->get();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product_category.add',compact('data', 'langArray', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
            'title' => ['required', 'unique:product_category', 'max:255']
        ]);

      $category = new product_category();
      $category->title = $request['title'];
      $category->language = $request['lang'];
      $category->parent_category = $request['parent_category'];
      $category->slug = Str::slug($category->title);
      $category->desc = (!$request['desc'])?'':$request['desc'];

      if ($request['publish']) {
        $category->shw = 'Y';
      }

      $category->save();
      return redirect('/admin/product_category/')->with('message', 'Record created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = product_category::findorfail($id); // fetch the category

      $data = product_category::where('id', '!=', 1)->get();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product_category.edit',compact('category', 'data', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $category = product_category::findorfail($id);
      $category->title = $request['title'];
      $category->parent_category = $request['parent_category'];
      $category->slug = Str::slug($category->title);
      $category->desc = (!$request['desc'])?'':$request['desc'];
      $category->language = $request['lang'];

      if ($request['publish']) {
        $category->shw = 'Y';
      }

      if ($request['draft']) {
        $category->shw = 'N';
      }

      $category->save();
      return redirect('/admin/product_category/')->with('message', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = product_category::findorfail($id); // fetch the category
      $category->shw = 'N';
      $category->save();
      $result = $category->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/product_category/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/product_category/')->with('message', 'Delete failed!');
        }
    }

    public function enable($id)
    {

      $category = product_category::findorfail($id);

      $category->shw ='Y';

      $category->save();
      return redirect('admin/product_category')->with('message', 'Category published!');
    }

    public function disable($id)
    {

      $category = product_category::findorfail($id);

      $category->shw ='N';

      $category->save();
      return redirect('admin/product_category')->with('message', 'Category un-published!');
    }

    public function permdelete($id) {
      $category = product_category::withTrashed()
                                ->where('id', $id)
                                ->first(); // fetch the category

      $result = $category->forceDelete();; //force delete the fetched category

      if ($result) {
            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/product_category/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/product_category/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function restore($id) {
      $category = product_category::onlyTrashed()->find($id);

        if (!is_null($category)) {
          //$category->deleted = 'N';
          $category->save();
            $category->restore();
            // return view('admin.category.detail', ['category' => Categories::findOrFail($id)]);
              return redirect('/admin/product_category/')->with('message', 'Record restored!');
        } else {

            return redirect('/admin/product_category/')->with('message', 'Restore failed!');
        }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $category = product_category::findorfail($id); // fetch the category
          $category->deleted = 'Y';
          $category->save();
          $result = $category->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/product_category/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/product_category/')->with('message','Records deleted!');
    }
}
