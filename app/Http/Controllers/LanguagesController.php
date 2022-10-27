<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $languages = Languages::orderBy('updated_at')->paginate(10);
      // $categories = Categories::orderBy('updated_at', request()->sort())->paginate(10);
      //return view('admin.category.index')->with('categories', compact('categories'));
      return view('admin.language.index',compact('languages'));
    }

    public function add() {
      return view('admin.language.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
      if(!$request['_method']) {
        // $validatedData = $request->validate([
        //     'name' => ['required', 'unique:languages', 'max:255']
        // ]);
        $language = new Languages();
        $language->name = $request['name'];
        $language->code = $request['code']?$request['code']:'';
        $language->locale = $request['locale'];
        $language->translation = $request['translation'];

        $language->shw = $request['chk_is_enabled']?'Y':'N';
        $language->is_default = $request['chk_is_default']?'Y':'N';

        if ($language->is_default == 'Y') {
          $languages = Languages::where('is_default', 'Y')->get();
          foreach ($languages as $an_other_langauge) {
            $an_other_langauge['is_default'] = 'N';
            $an_other_langauge->save();
          }
        }

        $language->save();
        return redirect('admin/language')->with('message', 'Record created!');
      }
      else {

        $language = Languages::findorfail($id);
        $language->name = $request['name']+ $id;
        $language->code = $request['code']?$request['code']:'';
        $language->locale = $request['locale'];
        $language->translation = $request['translation'];

        $language->shw = $request['chk_is_enabled']?'Y':'N';
        $language->is_default = $request['chk_is_default']?'Y':'N';

        if ($language->is_default == 'Y') {
          $languages = Languages::where('is_default', 'Y')->get();
          foreach ($languages as $an_other_langauge) {
            $an_other_langauge['is_default'] = 'N';
            $an_other_langauge->save();
          }
        }

        $language->save();
        return redirect('admin/language')->with('message', 'Record updated!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function show(Languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Languages::findorfail($id);
        return view('admin.language.edit',compact('language'));
    }

    public function update(Request $request, $id)
    {
      // $validatedData = $request->validate([
      //     'name' => ['required', 'unique:languages', 'max:255']
      // ]);
      $language = Languages::findorfail($id);
      $language->name = $request['name'];
      $language->code = $request['code']?$request['code']:'';
      $language->locale = $request['locale'];
      $language->translation = $request['translation'];

      $language->shw = $request['chk_is_enabled']?'Y':'N';
      $language->is_default = $request['chk_is_default']?'Y':'N';

      if ($language->is_default == 'Y') {
        $languages = Languages::where('is_default', 'Y')->get();
        foreach ($languages as $an_other_langauge) {
          $an_other_langauge['is_default'] = 'N';
          $an_other_langauge->save();
        }
      }

      $language->save();
      return redirect('admin/language')->with('message', 'Record updated!');
    }

    public function enable($id)
    {

      $language = Languages::findorfail($id);

      $language->shw ='Y';

      $language->save();
      return redirect('admin/language')->with('message', 'Language enabled!');
    }

    public function disable($id)
    {

      $language = Languages::findorfail($id);

      $language->shw ='N';

      $language->save();
      return redirect('admin/language')->with('message', 'Language disabled!');
    }

    public function set_default($id)
    {

      $old_default_language = Languages::where('is_default', 'Y')->first();


      $old_default_language->is_default ='N';
      $old_default_language->save();

      $language = Languages::where('id', $id)->first();
      $language->is_default ='Y';

      $language->save();
      return redirect('admin/language')->with('message', 'Default language changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Languages $languages)
    {
        //
    }

    public function get_language_list() {
        $languages = Languages::where('shw','Y')->get();

        //return response()->json($languages);
        return $languages;
    }

    static function get_language_name($id) {
        $language = Languages::where('code', $id)->where('shw','Y')->select('name')->first();
        $languageName = $language->name;

        //return response()->json($languages);
        return $languageName;
    }
}
