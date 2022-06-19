<?php
namespace App\Http\Controllers;
use App\Models\CourseDateReg;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class RegistationController extends Controller
{

    public function RegistationHome(){
        $data['allData'] = Registration::latest()->get();
        return view('backend.registration.applicant_view_registration', $data);

    }
    public function RegistationEdit($id) {
        $editData = Registration::find($id);
        return view('backend.registration.applicant_view_registration', compact('editData'));
    }

    public function RegistationDelete($id){
        Registration::find($id)->delete();
        $notification = array(
            'message' => ' Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('applicant.view')->with($notification);
    }










}
