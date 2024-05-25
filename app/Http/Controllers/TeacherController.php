<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //

    public function index(Request $request){
        

        $fields = [];
        $subject = subject::query();

        if ($request->get('search')) {
            $subject->where('name', 'like', "{$request->get('search')}%")
            ->orWhere('instructor', 'like', "{$request->get('search')}%");
        }

        if($request->get('prelim')){
            $subject->where('prelim', $request->get('prelim'));
        }

        if($request->get('midterm')){
            $subject->where('midterm', $request->get('midterm'));
        }

        if($request->get('prefinal')){
            $subject->where('year', $request->get('year'));
        }

        if ($request->get('final') && $request->get('direction')) {
            $subject->orderBy($request->get('sort'), $request->get('direction'));
        }

        if ($request->get('fields')) {
            $fields = explode(',', $request->get('fields'));
        }

        return response()->json($fields ? $subject->get($fields) : $subject->get());

        
    }

    public function select($id){
            try {
                return response()->json(subject::findORFail($id));
            } catch (\Throwable $th) {
                return response()->json(['message' => 'Not found'], 404);
            }
           
    }

    public function create(Request $request){
        $newSubject = subject::create([
            'subject_code' => $request->subject_code,
            'name' => $request->name,
            'description' => $request->description,
            'instructor' => $request->instructor,
            'schedule' => $request->schedule,
            'prelims'=>$request->prelims,
            'midterms'=>$request->midterms,
            'prefinals'=>$request->prefinals,
            'finals'=>$request->finals,
            'average_grade'=>$request->average_grade,
            'remarks'=>$request->remarks,
        ]);

        return $this->select($newSubject->id);
    }

    public function update(Request $request, $id){
        $subject = subject::findOrFail($id);
        $subject->update($request->all());
        return response()->json($subject);
    }

    public function delete ($id){
        $subject = students::findOrFail($id);
        $subject->delete();
        return response()->json($subject);
    }

    protected function caclAve($subject){
        $ave = ($subject->prelim + $subject->midterm + $subject->prefinal + $subject->final)/4;

        $remarks = $ave >= 3.0 ? 'PASSED' : 'FAILED';

        $subject->average_grade = $ave;
        $subject->remarks = $remarks;

        return $subject;
    }
}
