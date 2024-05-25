<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

   public function index(Request $request){
    //$students = Student::all();
    $fields = [];
    $students = Student::query();

    if($request->get('search')){
        $students->where('firstname','like',"%{$request->get('search')}%")
       ->orWhere('lastname','like',"%{$request->get('search')}%");
    }   

    if($request->get('sex')){
        $students->where('sex',$request->get('sex'));
    }
    if($request->get('course')){
        $students->where('course',$request->get('course'));
    }

    if($request->get('sort')&& $request->get('direction')){
        $students->orderBy($request->get('sort'),$request->get('direction'));
    }    

    if($request->get('fields')){
        $fields = explode(',',$request->get('fields'));
    }    
    return response() ->json($fields ? $students->get($fields) : $students->get());
   }
   public function select($id){
    try {
        return response()->json(Student::findOrFail($id));
    } catch (\Throwable $th) {
        Throw $th;
    }
   }
   public function create(Request $request){
    $newStudent = Student::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'year' => $request->year,
        'course' => $request->course,
        'sex' => $request->sex,
        'address' => $request->address,
        'birthdate' => $request->birthdate,
        'section' => $request->section,
    ]);
    return $this->select($newStudent->id);
   }

   public function update(Request $request, $id){
    $student = Student::findOrFail($id);
    $student->update($request->all());

    return response()->json($student);
   }

   public function delete($id){
    $student = Student::findOrFail($id);
    $student->delete();
    return response()->json($student);
   }

}