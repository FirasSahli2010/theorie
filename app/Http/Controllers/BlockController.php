<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Categories;
use App\Models\Pages;
use App\Models\Posts;
use App\Models\Template;

use Illuminate\Http\Request;

use Illuminate\Support\Str;


class BlockController extends Controller
{

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
      $blocks = Block::sortable()->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.block.index',compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Block::max('order');
        $new_order = $order + 1;

        $category_data = Categories::all();
        $page_data = Pages::all();
        $post_data = Posts::all();

        $template_date = Template::all();

        $langListAsJSON = $this->langController->get_language_list();

        $langArray = $langListAsJSON;

        return view('admin.block.add',compact('category_data', 'page_data', 'post_data', 'template_date', 'langArray'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = new Block();

        $block->title = $request['title'];
        $block->name = $request['name'];
        $block->template = $request['template'];
        $block->category = $request['category'];
        $block->post = $request['post'];
        $block->page = $request['page'];
        $block->language = $request['language'];
        $block->shw = 'N'; //$request['post'];
        $block->order = $request['order'];
        $block->possition = $request['position'];
        if ($request['publish']) {
          $block->shw = 'Y';
        }

        $block->save();

        return redirect('/admin/block/')->with('message', 'Record created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $block = Block::findorfail($id); // fetch the page

      $category_data = Categories::all();
      $page_data = Pages::all();
      $post_data = Posts::all();

      $template_date = Template::all();

      $langListAsJSON = $this->langController->get_language_list();

      $langArray = $langListAsJSON;

      return view('admin.block.edit',compact('block', 'category_data', 'page_data', 'page_data', 'post_data', 'template_date',  'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $block = Block::findorfail($id);

      $block->title = $request['title'];
      $block->name = $request['name'];
      $block->template = $request['template'];
      $block->category = $request['category'];
      $block->post = $request['post'];
      $block->page = $request['page'];
      $block->language = $request['language'];
      // $block->shw = 'N'; //$request['post'];
      $block->order = $request['order'];
      $block->possition = $request['position'];
      if ($request['publish']) {
        $block->shw = 'Y';
      }

      $block->save();

      return redirect('/admin/block/')->with('message', 'Record created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $block = Block::findorfail($id); // fetch the category

      $result = $block->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/block/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/block/')->with('message', 'Delete failed!');
        }
    }

    public function enable($id)
    {

      $block = Block::findorfail($id);

      $block->shw ='Y';

      $block->save();
      return redirect('admin/block')->with('message', 'Block enabled!');
    }

    public function disable($id)
    {

      $block = Block::findorfail($id);

      $block->shw ='N';

      $block->save();
      return redirect('admin/block')->with('message', 'Block disabled!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $block = Block::findorfail($id); // fetch the category
          $result = $block->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/block/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/block/')->with('message','Records deleted!');
    }
}
