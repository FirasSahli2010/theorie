<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Categories;
use App\Http\Controllers\LanguagesController;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PagesController extends Controller
{
  public function __construct() {
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
      $pages = Pages::sortable()->withTrashed()->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      // $categories = Categories::orderBy('updated_at', request()->sort())->paginate(10);
      //return view('admin.category.index')->with('categories', compact('categories'));
      return view('admin.page.index',compact('pages'));
    }

    public function enable($id)
    {

      $page = Pages::findorfail($id);

      $page->shw ='Y';

      $page->save();
      return redirect('admin/page')->with('message', 'Page published!');
    }

    public function disable($id)
    {

      $page = Pages::findorfail($id);

      $page->shw ='N';

      $page->save();
      return redirect('admin/page')->with('message', 'Page published!');
    }

    public function permdelete($id) {
      $page = Pages::withTrashed()
                                ->where('id', $id)
                                ->first(); // fetch the category

      $result = $page->forceDelete();; //force delete the fetched category

      if ($result) {
            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/page/')->with('message', 'page deleted!');
        } else {

            return redirect('/admin/page/')->with('message', 'page failed!');
        }

        return response($response);
    }

    public function restore($id) {
      $page = Pages::onlyTrashed()->find($id);

        if (!is_null($page)) {
          $page->deleted = 'N';
          $page->save();
            $page->restore();
            // return view('admin.category.detail', ['category' => Categories::findOrFail($id)]);
              return redirect('/admin/page/')->with('message', 'Record restored!');
        } else {

            return redirect('/admin/page/')->with('message', 'Restore failed!');
        }
        return response($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.page.add',compact('data', 'langArray'));
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
            'title' => ['required', 'unique:categories', 'max:255']
        ]);

      $page = new Pages();
      $page->title = $request['title'];
      $page->language = $request['lang'];
      $page->category = $request['parent_category'];
      $page->slug = Str::slug($page->title);
      $page->desc = (!$request['desc'])?'':$request['desc'];
      $page->lb_content = $request['desc'];

      if ($request['publish']) {
        $page->shw = 'Y';
      }

      $page->save();
      return redirect('/admin/page/')->with('message', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Pages::findorfail($id); // fetch the page
        return view('admin.page.detail',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $page = Pages::findorfail($id); // fetch the page

      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.page.edit',compact('page', 'data', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // $validatedData = $request->validate([
      //       'title' => ['required', 'unique:categories', 'max:255']
      //   ]);

      // $id = 8; //$request['id'];

      $page = Pages::findorfail($id);
      $page->title = $request['title'];
      $page->category = $request['parent_category'];
      $page->slug = Str::slug($page->title);
      $page->desc = (!$request['desc'])?$page['desc']:$request['desc'];
      $page->language = $request['lang'];
      $page->lb_content = (!$request['desc'])?$page['lb_content']:$request['desc'];

      if ($request['publish']) {
        $page->shw = 'Y';
      }

      if ($request['draft']) {
        $page->shw = 'N';
      }

      $page->save();
      return redirect('/admin/page/')->with('message', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $page = Pages::findorfail($id); // fetch the category
      $page->deleted = 'Y';
      $page->save();
      $result = $page->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/page/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/page/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $page = Pages::findorfail($id); // fetch the category
          $page->deleted = 'Y';
          $page->save();
          $result = $page->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/page/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/page/')->with('message','Record deleted!');
    }
}
