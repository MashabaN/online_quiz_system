<<<<<<< HEAD
 /make model for Subjects/

use App\ModeIs\Exam;

class AdminController extends Controller
{
    //exam dashboard load
    public function examDashboard()
    {
        return view('admin.exam-dashboard');
    }

}
=======
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class AdminController extends Controller
{

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

}

>>>>>>> 383b42c27b316b9884224b366892c5875ef38f48
