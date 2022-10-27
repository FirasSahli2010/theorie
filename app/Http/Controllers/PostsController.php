<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Categories;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\CategoriesController;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PostsController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->langController = new LanguagesController();
    $this->categoryController = new CategoriesController();
  }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Posts::sortable()
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('shw', 'asc')
                    ->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      // $categories = Categories::orderBy('updated_at', request()->sort())->paginate(10);
      //return view('admin.category.index')->with('categories', compact('categories'));
      return view('admin.post.index',compact('posts'));
    }

    public function enable($id)
    {

      $post = Posts::findorfail($id);

      $post->shw ='Y';

      $post->save();
      return redirect('admin/post')->with('message', 'Post published!');
    }

    public function disable($id)
    {

      $post = Posts::findorfail($id);

      $post->shw ='N';

      $post->save();
      return redirect('admin/post')->with('message', 'Post published!');
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

      return view('admin.post.add',compact('data', 'langArray'));
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
      $validatedData = $request->validate([
            'title' => ['required', 'unique:categories', 'max:255']
        ]);

      $post = new Posts();
      $post->title = $request['title'];
      $post->language = $request['lang'];
      $post->category = $request['parent_category'];
      $post->slug = Str::slug($post->title);
      $post->desc = (!$request['desc'])?'':$request['desc'];
      $post->lb_content = $request['desc'];

      if ($request["post_image"]) {
        //$image_name = $request["post_image"]->getClientOriginalName().'.'.$request["post_image"]->extension(); //->extension();
        //$image_name = 'post_image'.date().$request["post_image"]->extension(); //->extension();
        $time = date("YMdHis");
        $image_name = $time.'.'.$request["post_image"]->extension(); ;

        //$request["post_image"]->storeAs('post_image', $image_name);

        $request["post_image"]->move(public_path('images'), $image_name);

        $post->image = $image_name;
      }

      $post->shw = 'N';

      if ($request['publish']) {
        $post->shw = 'Y';
      }

      $post->save();
      return redirect('/admin/post/')->with('message', 'Record created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Posts::findorfail($id); // fetch the post
      return view('admin.post.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Posts::findorfail($id); // fetch the posr

      $data = Categories::all();
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.post.edit',compact('post', 'data', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Posts::findorfail($id);
      $post->title = $request['title'];
      $post->category = $request['parent_category'];
      $post->slug = Str::slug($post->title);
      $post->desc = (!$request['desc'])?$post['desc']:$request['desc'];
      $post->language = $request['lang'];
      $post->desc = ($request['desc'])?$post['desc']:$request['desc'];

      if ($request['publish']) {
        $post->shw = 'Y';
      }

      if ($request['draft']) {
        $post->shw = 'N';
      }

      if ($request['deleteImage'] ) {
        $post->image = '';
      }
      else if ($request["post_image"]) {
        //$image_name = $request["post_image"]->getClientOriginalName().'.'.$request["post_image"]->extension(); //->extension();
        //$image_name = 'post_image'.date().$request["post_image"]->extension(); //->extension();
        $time = date("YMdHis");
        $image_name = $time.'.'.$request["post_image"]->extension(); ;

        //$request["post_image"]->storeAs('images', $image_name);

        $request["post_image"]->move(public_path('images'), $image_name);

        $post->image = $image_name;
      }

      $post->save();
      return redirect('/admin/post/')->with('message', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Posts::findorfail($id); // fetch the category

      $result = $post->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/post/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/post/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        //return $ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $post = Posts::findorfail($id); // fetch the category
          //$post->deleted = 'Y';
          //$post->save();
          $result = $post->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/post/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/post/')->with('message','Record deleted!');
    }
}
