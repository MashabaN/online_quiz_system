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