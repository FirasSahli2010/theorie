<?php

namespace App\Http\Controllers;

use App\Models\MeunItem;
use App\Models\Meun;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MeunItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($menu_id)
    {
        $menu = Meun::findOrFail($menu_id);
        return view('admin.menu_item.add', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $menuItem = new MeunItem();
      $menuItem->title = $request['title'];
      $menuItem->slug = Str::slug($menuItem->title);
      $menuItem->name = Str::slug($menuItem->title);
      $menuItem->order = 0;
      $menuItem->link = $request['link'];
      $menuItem->menu_id = $request['menu'];
      $menuItem->save();
      return redirect('/admin/menu/'.$menuItem->menu_id)->with('message', 'Record created!');
    }

    public function show($request)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeunItem  $meunItem
     * @return \Illuminate\Http\Response
     */
    public function edit($menu_id, $id)
    {
        $menu = Meun::findOrFail($menu_id);
        $menu_item = MeunItem::findOrFail($id);
        return view('admin.menu_item.edit', compact('menu', 'menu_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeunItem  $meunItem
     * @return \Illuminate\Http\Response
     */
    public function modify($menu, $id)
    {
      return 'modify is called';
      // $menuItem = MeunItem::findOrFail($id);
      // $menuItem->title = $request['title'];
      // $menuItem->slug = Str::slug($menuItem->title);
      // $menuItem->name = Str::slug($menuItem->title);
      // $menuItem->order = 0;
      // $menuItem->link = $request['link'];
      // $menuItem->menu_id = $request['menu'];
      // $menuItem->save();
      // return redirect('/admin/menu/'.$request['menu'])->with('message', 'Record updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeunItem  $meunItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menu, $id)
    {
      //return 'Update is called';
      $menuItem = MeunItem::findOrFail($id);
      $menuItem->title = $request['title'];
      $menuItem->slug = Str::slug($menuItem->title);
      $menuItem->name = Str::slug($menuItem->title);
      $menuItem->order = 0;
      $menuItem->link = $request['link'];
      //$menuItem->menu_id = $menu;
      $menuItem->save();
      return redirect('/admin/menu/'.$menu)->with('message', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeunItem  $meunItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu_item = MeunItem::findorfail($id); // fetch the category
      $menu_id = $menu_item->menu_id;

      $result = $menu_item->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/menu/'.$menu_id)->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/menu/'.$menu_id)->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function enable($menu_id, $id)
    {

      $menuItem = MeunItem::findorfail($id);

      $menuItem->shw ='Y';

      $menuItem->save();
      return redirect('admin/menu/'.$menu_id)->with('message', 'Menu item enabled!');
    }

    public function disable($menu_id, $id)
    {

      $menuItem = MeunItem::findorfail($id);

      $menuItem->shw ='N';

      $menuItem->save();
      return redirect('admin/menu/'.$menu_id)->with('message', 'Menu item disabled!');
    }
}
