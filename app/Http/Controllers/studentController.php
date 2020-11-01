<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$students =  DB::Select("select * from student_info");//basic database
       //query builder
       $students = DB::table('student_info')->get();
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
        'roll'=> 'required|min:2'

      ]);
      $name = $request->name;
      $roll = $request->roll;
      $res = DB::Select("select * from student_info where roll = $roll");
      if(empty($res)){
        DB::Select("insert into student_info(name, roll)values('$name',$roll)");
        return redirect()->back()->with('message','student data inserted successfully');
      }
      else{
        return redirect()->back()->with('message','Roll already exists');
      }

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
        $student =DB::table('student_info')->where('id', $id)->get();
       return view('admin.student.edit')->with('student', $student);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('student_info')->where('id', $id)->delete();
       return back()->with('message','information is deleted successfully');
    }
}
