<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //
   public function index(Request $request){
    //$students = Student::all();
    $fields = [];
    $teacher = Teacher::query();

    if($request->get('search')){
        $teacher->where('firstname','like',"%{$request->get('search')}%")
       ->orWhere('lastname','like',"%{$request->get('search')}%");
    }   

    if($request->get('sex')){
        $teacher->where('sex',$request->get('sex'));
    }
    if($request->get('course')){
        $teacher->where('course',$request->get('course'));
    }

    if($request->get('sort')&& $request->get('direction')){
        $teacher->orderBy($request->get('sort'),$request->get('direction'));
    }    

    if($request->get('fields')){
        $fields = explode(',',$request->get('fields'));
    }    
    return response() ->json($fields ? $teacher->get($fields) : $teacher->get());
   }
   public function select($id){
    try {
        return response()->json(Teacher::findOrFail($id));
    } catch (\Throwable $th) {
        Throw $th;
    }
   }
   public function create(Request $request){
    $newTeacher = Teacher::create([
        'subject_code' => $request->subject_code,
        'name' => $request->name,
        'description' => $request->description,
        'instructor' => $request->instructor,
        'schedule' => $request->schedule,
        'grades' => $request->grades,
        'prelims' => $request->prelims,
        'midterms' => $request->midterms,
        'prefinals' => $request->prefinals,
        'finals' => $request->finals,
        'average_grade' => $request->average_grade,
        'remarks' => $request->remarks,
    ]);
    return $this->select($newTeacher->id);
   }

   public function update(Request $request, $id){
    $teacher = Teacher::findOrFail($id);
    $teacher->update($request->all());

    return response()->json($teacher);
   }

   public function delete($id){
    $teacher = Teacher::findOrFail($id);
    $teacher->delete();
    return response()->json($teacher);
   }

}
