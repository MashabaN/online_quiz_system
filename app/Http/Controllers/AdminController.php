<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\ModeIs\Exam;

use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

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
    public function deleteSubject(Request $request){
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

    //add Student
    public function addStudent(Request $request)
    {
        try{
            $password = Str::random(8);

            User::insert([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($password),
            ]);

            $url = URL::to('/');
            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $password;
            $data['title'] = "Student Registration on Online Quiz System.";

            Mail::send('registrationMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return response()->json(['success'=>true,'msg'=> 'Student added Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    //update Student
    public function editStudent(Request $request)
    {
        try{


            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $url = URL::to('/');
            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
           
            $data['title'] = "Updated Student Profile on Online Quiz System.";

            Mail::send('updateProfileMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return response()->json(['success'=>true,'msg'=> 'Student Updated Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
    
    //delete Student
    public function deleteStudent(Request $request){
        try{
            User::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=> 'Student Deleted Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]); 
        }   
    }

}






