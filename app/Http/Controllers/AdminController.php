<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\ModeIs\Exam;

class AdminControController extends Controller{

    //add subject
    public function addSubject(Request $request){
        try{
            Subject::insert([
                'subject' => $request->subject
            ]);
            return response()->json(['success'=>true,'msg' => 'Subject Added Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    //edit subject
    public function editSubject(Request $request){
        try{
            $subject = Subject::find($request->id);
            $subject->subject = $request->subject;
            $subject->save();

            return response()->json(['success'=>true,'msg'=> 'Subject Updated Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    //delete Subject
    public function deleteSubject(Request $request){
        try{
            Subject::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=> 'Subject Deleted Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    //exam dashboard load
    public function examDashboard(){
        $subjects = Subject::all();
        $exams = Exam::with('Subjects')->get();

        return view('admin.exam-dashboard',['subjects'=>$subjects,'exams'=>$exams]);
    }

    //add exam
    public function addExam(Request $request){
        try{
            Exam::insert([
                'Exam_name' =>$request->Exam_name,
                'Subject_ID' => $request->Subject_ID,
                'Date' => $request->Exam_name,
                'Time' => $request->Time,
            ]);
            return response()->json(['success'=>true,'msg'=> 'Exam Added Successfully!']);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

    //exam details
    public function getExamDetail($id){
        try{
            Exam::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$exams]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    //update Exam
    public function updateExam(Request $request){
        try{
            $exam = Exam::find($request->exam_id);
            $exam->Exam_name = $request->exam_name;
            $exam->Subject_ID = $request->Subject_ID;
            $exam->Date = $request->Date;
            $exam->Time = $request->Time;
            $exam->save();

            return response()->json(['success'=>true,'msg'=>'Exam Updated Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

    //student dashboard
    public function studentDashboard(){
        $students = User::where('is_admin',0)->get();
        return view('admin.studentDashboard',compact('students'));
    }
}