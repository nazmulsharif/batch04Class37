<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Studentt;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       //$students =  DB::Select("select * from student_info");//basic database
       //query builder
      // $students = DB::table('student_info')->get();
        $student = new Studentt();
        $students = $student->get();
       return view('admin.student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
            'name'=>'required',
            'roll'=> 'required|min:2',
             'phone'=>'nullable',
            'image'=>'image'


      ]);
      $name = $request->name;
      $roll = $request->roll;
      $student = new Studentt();
      $student->name =  $name;
      $student->roll = $roll;
      $student->phone_no = $request->phone;
      $student->address = $request->address;
      if($request->hasFile('image')){
          $image = $request->image->store('public/images');
          $student->image = $image;
      }
      $student->save();
      return redirect()->back()->with('message','student data inserted successfully');
      /*$res = DB::Select("select * from student_info where roll = $roll");
      if(empty($res)){
        DB::Select("insert into student_info(name, roll)values('$name',$roll)");

      }
      else{
        return redirect()->back()->with('message','Roll already exists');
      }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = Studentt::find($id);
        //return $student->name;
         return view('admin.student.edit')->with('std', $student);
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
        $name = $request->name;
        $roll = $request->roll;
        $student = Studentt::find($id);
        $student->name = $name;
        $student->roll = $roll;
        $student->save();
        return redirect()->route('student.index')->with('success','Information is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //DB::table('student_info')->where('id', $id)->delete();
        $student = new Studentt();
        $student = $student->find($id);
        $student->delete();
       return back()->with('message','information is deleted successfully');
    }
    public function trash(){
      $students = Studentt::onlyTrashed()->get();
      return view('admin.student.trash', compact('students'));
    }
    public function permanentDelete($id){
      Studentt::where('id', $id)->forceDelete();
      return redirect()->back()->with('message','Information is permanently deleted');
    }
    public function restore($id){
      Studentt::withTrashed()->where('id', $id)->restore();
      return back()->with('message', 'information is restored successfully');
    }
}
