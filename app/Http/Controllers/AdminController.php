<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\ModeIs\Exam;

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
    }

    catch(\Exception $e){
        return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
}
}

    //exam dashboard load
    public function examDashboard()
    {
        return view('admin.exam-dashboard');
    }
// here will be the exams part
    

    //student dashboard
    public function studentDasboard()
    {
        $students = User::where('is_admin',0)->get();
        return view('admin.studentsDashboard',compact('students'));
    }

}






