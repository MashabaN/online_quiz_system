<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\ModeIs\Exam;
use App\ModeIs\Question;
use App\ModeIs\Answer;

class AdminController extends Controller
{
    //add subject
    public function addSubject(Request $request)
    {
        try{

            Subject::insert([
                'subject' => $request->subject
            ]);

            return response()->json(['success'=>true,'msg' =>'Subject added Successfully!']);
        }

        catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
}
//edit Subject
public function editSubject(Request $request)
{
    try{


        $subject = Subject::find($request->id);
        $subject->subject = $request->subject;
        $subject->save();
        return response()->json(['success'=>true,'msg' =>'Subject Updated Successfully!']);
    }

    catch(\Exception $e){
        return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
}
}

//delete Subject
public function deleteSubject(Request $request)
{
    try{

        Subject::where('id',$request->id)->delete();
        return response()->json(['success'=>true,'msg' =>'Subject Deleted Successfully!']);
    

    }catch(\Exception $e){
        return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        
    };
}

    //exam dashboard load
    public function examDashboard()
    {
        $subjects = Subject::all();
        $exams = Exam::with('Subjects')->get();
    
    
        return view('admin.exam-dashboard',['subjects'=>$subjects,'exams'=>$exams]);
    }
    // add exam
    public function addExam(Request $request)
    {
        try{

            Exam::insert([
                'Exam_name' => $request->Exam_name,
                'Subject_ID' => $request->Subject_ID,
                'Date'=> $request->Exam_name,
                'Time' => $request ->Time,
                'Attempted' => $request ->Attempted
            ]);
                
            
            return response()->json(['success'=>true,'msg' =>'Exam Added Successfully!']);
        
    
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
            
        };

    }
    public function getExamDetail($id)
    {
        try{

            Exam::where('id',$id)->get();
            
            return response()->json(['success'=>true,'data' =>$exam]);
         
     
         }catch(\Exception $e){
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
             
         };
    }   

    public function updateExam(Request $request)
    {
        try{

            $exam = Exam::find($request->exam_id);
            $exam->Exam_name = $request->exam_name;
            $exam->Subject_ID = $request->Subject_ID;
            $exam->Date = $request->Date;
            $exam->Time = $request->Time;
            $exam->save();
            return response()->json(['success'=>true,'msg'=> 'Exam updated successfully!']);

            
            
         
     
         }catch(\Exception $e){
             return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
             
         };

    }

    //delete exam
    public function deleteExam(Request $request)
    {
        try{

            Exam::where('id',$request->Exam_ID)->delete();
            return response()->json(['success'=>true,'msg'=> 'Exam Deleted successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
            
        };

    }

    public function qnaDashboard()
    {
        $questions = Question::with('answers')->get();
        return view ('admin.qnaDashboard',compact('questions'));
    }

    // add q&a
    public function addQna(Request $request)
    {
        try{

            $question_Id = Question::inserGetId([
                'Question' => $request-
            ]);

           foreach($request->Answer as $answer){

               $is_correct = 0;
               if($request->is_correct == $answer){
                   $is_correct = 1;



               }
               Answer::insert([
                   'Question_ID' =>$question_Id
                   'Answer' =>$answer,
                   'Is_correct => $is_correct

                

               ]); 

           }

            return response()->json(['success'=>true,'msg'=> 'Exam Deleted successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
            
        };
        
        return response()->json($request->all());
    }
}

    

    //student dashboard
    public function studentDasboard()
    {
        $students = User::where('is_admin',0)->get();
        return view('admin.studentsDashboard',compact('students'));
    }







