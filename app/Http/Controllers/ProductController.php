<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\product_category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Controllers\LanguagesController;

use App\Http\Controllers\ProductCategoryController;

class ProductController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::sortable()->orderBy('updated_at', 'desc')->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = product_category::where('parent_category', '=', '1')->where('shw', '=', 'Y')->get();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product.add',compact('data', 'langArray'));
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
            'name' => ['required', 'unique:products', 'max:255']
        ]);

      $product = new Product();
      $product->name = $request['name'];
      $product->language_id = $request['lang'];
      $product->price = (!$request['price'])?0.0:$request['price'];
      //$product->category = $request['parent_category'];

      $product->slug = Str::slug($product->name);
      $product->description = (!$request['desc'])?'':$request['desc'];

      $product->summery = (!$request['summ'])?'':$request['summ'];
      //$product->lb_content = $request['desc'];

      if ($request["image"]) {

        $time = date("YMdHis");
        $image_name = $time.'.'.$request["image"]->extension();

        //$image_name = $request["image"]->getClientOriginalName().'.'.$request["image"]->extension(); //->extension();

        //$request["image"]->storeAs('images', $image_name);

        $request["image"]->move(public_path('images'), $image_name);

        $product->image = $image_name;
      }

      // if ($request['publish']) {
      //   $page->shw = 'Y';
      // }

      $product->save();


      $parent_category = $request['parent_category'];
      $product->categories()->attach($parent_category);
      //foreach ($parent_category as $category) {
        //$product_category = product_category::find($category);
        //$product->categories()->attach($product_category);
        //$product->save();

      //}

      return redirect('/admin/products/')->with('message', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::findorfail($id)->load('categories');

      $cat_ids = [];
      $categories = $product->categories;
      foreach ( $categories as $product_category) {
        array_push($cat_ids, $product_category->id);
      }
      //$data = product_category::all();
      $data = product_category::where('parent_category', '=', '1')->where('shw', '=', 'Y')->get();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.product.edit',compact('product', 'data', 'langArray', 'cat_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //return
      // $validatedData = $request->validate([
      //       'name' => ['required', 'unique:products', 'max:255']
      //   ]);

      $product = Product::findorfail($id);
      $product->name = $request['name'];
      $product->language_id = $request['lang'];
      $product->price = (!$request['price'])?0.0:$request['price'];
      //$product->category = $request['parent_category'];

      $product->slug = Str::slug($product->name);
      $product->description = (!$request['desc'])?'':$request['desc'];

      $product->summery = (!$request['summ'])?'':$request['summ'];

      if ($request['deleteImage'] ) {
        $product->image = '';
      }
      else if ($request["image"]) {
        $image_name = $request["image"]->getClientOriginalName().'.'.$request["image"]->extension(); //->extension();

        $request["image"]->storeAs('images', $image_name);

        $request["image"]->move(public_path('images'), $image_name);

        $product->image = $image_name;
      }

      $product->save();

      // $parent_category = product_category::find($request['parent_category']);
      // $product->categories()->attach($parent_category);

      // $parent_category = $request['parent_category'];
      // foreach ($parent_category as $category) {
      //   $product_category = product_category::find($category);
      //   $product->categories()->attach($product_category);
      //   $product->save();
      // }

      $parent_category = $request['parent_category'];
      $product->categories()->sync($parent_category);

      if ($request['publish']) {
        $category->shw = 'Y';
      }

      $product->save();
      return redirect('/admin/products')->with('message', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id); // fetch the category
        $result = $product->delete(); //delete the fetched category

        if ($result) {

              // return view('admin.category.index',compact('categories'));
              return redirect('/admin/products/')->with('message', 'Record deleted!');
          } else {

              return redirect('/admin/products/')->with('message', 'Delete failed!');
          }
    }

    public function enable($id)
    {

      $product = Product::findorfail($id);

      $product->shw ='Y';

      $product->save();
      return redirect('admin/products')->with('message', 'Product published!');
    }

    public function disable($id)
    {

      $product = Product::findorfail($id);

      $product->shw ='N';

      $product->save();
      return redirect('admin/products')->with('message', 'Product un-published!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $product = Product::findorfail($id); // fetch the product

          $result = $product->delete(); //delete the fetched produc

          if (!$result) {
            return redirect('/admin/products/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/products/')->with('message','Records deleted!');
    }
}
