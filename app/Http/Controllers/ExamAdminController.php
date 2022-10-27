<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\exam;

use Illuminate\Support\Str;

use App\Http\Controllers\LanguagesController;

class ExamAdminController extends Controller
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
      $examinations = exam::sortable()->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      return view('admin.exam.index',compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $langListAsJSON = $this->langController->get_language_list();

      $langArray = $langListAsJSON;

      return view('admin.exam.add',compact('langArray'));
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
            'title' => ['required', 'unique:exam', 'max:255']
        ]);

      $exam = new exam();
      $exam->title = $request['title'];
      $exam->language = $request['lang'];
      $exam->exam_num = $request['num'];

      if ($request["exam_img"]) {
        $time = date("YMdHis");
        $image_name = $time.'.'.$request["exam_img"]->extension(); ;
        $request["exam_img"]->move(public_path('images'), $image_name);
        $exam->img = $requset['exam_img'];
      }

      if ($request['publish']) {
        $exam->shw = 'Y';
      }

      $exam->save();
      return redirect('/admin/exams/')->with('message', 'Examination created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $examin = exam::findOrFail($id);
      $questions = $examin->questions();
      return view('admin.exam.detail', compact('examin', 'questions') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examin = exam::findorfail($id);
        $langListAsJSON = $this->langController->get_language_list();

        $langArray = $langListAsJSON;

        return view('admin.exam.edit', compact('examin', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
            'title' => ['required', 'max:255']
        ]);

        $exam = exam::findorfail($id);

      $exam->title = $request['title'];
      $exam->language = $request['lang'];
      $exam->exam_num = $request['num'];

      if ($request["exam_img"]) {
        $time = date("YMdHis");
        $image_name = $time.'.'.$request["exam_img"]->extension(); ;
        $request["exam_img"]->move(public_path('images'), $image_name);
        $exam->img = $requset['exam_img'];
      }

      if ($request['publish']) {
        $exam->shw = 'Y';
      }

      $exam->save();
      return redirect('/admin/exams/')->with('message', 'Examination created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = exam::findorfail($id);

        $result = $exam->delete();

        if ($result) {

              // return view('admin.category.index',compact('categories'));
              return redirect('/admin/exams/')->with('message', 'Record deleted!');
          } else {

              return redirect('/admin/exams/')->with('message', 'Delete failed!');
          }

          return response($response);
    }


    public function enable($id)
    {

      $examination = exam::findorfail($id);

      $examination->shw ='Y';

      $examination->save();
      return redirect('admin/exams')->with('message', 'Examination published!');
    }

    public function disable($id)
    {

      $examination = exam::findorfail($id);

      $examination->shw ='N';

      $examination->save();
      return redirect('admin/exams')->with('message', 'Examination un-published!');
    }

    public function permdelete($id) {
      $examination = exam::where('id', $id)
                                ->first(); // fetch the examination

      $result = $examination->forceDelete();; //force delete the fetched examination

      if ($result) {
            return redirect('/admin/exams/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/exams/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $examination = exam::findorfail($id); // fetch the category
          $examination->deleted = 'Y';
          $examination->save();
          $result = $examination->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/exams/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/exams/')->with('message','Records deleted!');
    }
}
