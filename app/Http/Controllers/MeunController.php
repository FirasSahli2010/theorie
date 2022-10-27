<?php

namespace App\Http\Controllers;
use App\Http\Controllers\LanguagesController;
use App\Models\Categories;
use App\Models\Languages;

use App\Models\Meun;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class MeunController extends Controller
{

  private LanguagesController $langController;

  public function __construct()
  {
      $this->middleware('auth');
      $this->langController = new LanguagesController();
      $this->categoryController= new CategoriesController();
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menus = Meun::sortable()->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.menu.add',compact('data', 'langArray'));
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
            'name' => ['required', 'unique:meuns', 'max:255']
        ]);

      $menu = new Meun();
      $menu->title = $request['title'];
      $menu->name = $request['name'];
      $menu->language = $request['lang'];
      $menu->category = $request['parent_category'];
      $menu->slug = Str::slug($menu->name);
      $menu->possition = $request['position'];
      $menu->shw = 'N';

      $menu->save();
      //return redirect('/admin/menu/'.$menu->id.'/update')->with('message', 'Record created!');
      return redirect('/admin/menu/')->with('message', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meun  $meun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //$category = Categories::findOrFail($id).get();
      $menu = Meun::findOrFail($id);

      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      $category = $menu->parent_category;
      $catTitle = $category->title;

      $language = $menu->parent_language;
      $langName = $language->name;

      $menu_items = $menu->menu_items;
      return view('admin.menu.detail', compact('menu', 'data', 'category', 'catTitle', 'language', 'langName', 'menu_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meun  $meun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $menu = Meun::findorfail($id); // fetch the page

      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.menu.edit',compact('menu', 'data', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meun  $meun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $menu = Meun::findorfail($id);
      $menu->title = $request['title'];
      $menu->name = $request['name'];
      $menu->language = $request['lang'];
      $menu->category = $request['parent_category'];
      $menu->slug = Str::slug($menu->name);
      $menu->possition = $request['position'];
      //$menu->shw = 'N';

      if ($request['publish']) {
        $menu->shw = 'Y';
      }

      if ($request['draft']) {
        $menu->shw = 'N';
      }

      $menu->save();
      //return redirect('/admin/menu/'.$menu->id.'/update')->with('message', 'Record created!');
      return redirect('/admin/menu/')->with('message', 'Record created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meun  $meun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = Meun::findorfail($id); // fetch the category

      $result = $menu->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/menu/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/menu/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function enable($id)
    {

      $menu = Meun::findorfail($id);

      $menu->shw ='Y';

      $menu->save();
      return redirect('admin/menu')->with('message', 'Menu published!');
    }

    public function disable($id)
    {

      $menu = Meun::findorfail($id);

      $menu->shw ='N';

      $menu->save();
      return redirect('admin/menu')->with('message', 'menu un-published!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $menu = Meun::findorfail($id); // fetch the category
          $result = $menu->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/menu/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/menu/')->with('message','Records deleted!');
    }
}
