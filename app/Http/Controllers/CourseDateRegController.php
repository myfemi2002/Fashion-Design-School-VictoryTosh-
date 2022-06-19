<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CourseDateReg;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class CourseDateRegController extends Controller
{
    public function CourseDateHome() {
        $data['allData'] = CourseDateReg::latest()->get();
        return view('backend.registration.index_course_admission', $data);
    }

    public function CourseDateAdd() {
        return view('backend.registration.add_course_admission');
    }

    public function CourseDateStore(Request $request)
    {
        $validateData = $request->validate(
            [
                'course' => 'required',
                'admission' => 'required',
            ],
            [
                'course.required' => 'Please Input course Field',
                'admission.required' => 'Please Input admission Field',
        ]
        );
        CourseDateReg::insert([
            'course' => $request->course,
            'admission' => $request->admission,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Course and Date Added Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('coursedate.view')->with($notification);
    }

    public function CourseDateEdit($id) {
        $editData = CourseDateReg::find($id);
        return view('backend.registration.edit_course_admission', compact('editData'));
    }

    public function CourseDateUpdate(Request $request, $id) {

        CourseDateReg::find($id)->update([
                'course' => $request->course,
                'admission' => $request->admission,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Course and Date Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('coursedate.view')->with($notification);
        }

        public function CourseDateDelete($id){
            CourseDateReg::find($id)->delete();
            $notification = array(
                'message' => 'Course and Date Deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('coursedate.view')->with($notification);
        }

        public function RegistrationPage(){
            $freg= CourseDateReg::orderBy('id')->get();
            return view('pages.registration.registration', compact('freg'));
        }


        public function RegistrationForm(Request $request)
        {
            $validateData = $request->validate(
                [
                    'course' => 'required',
                    'admission' => 'required',
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required',
                    // 'email' => 'email:rfc,dns',
                    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'address' => 'required',
                    'city' => 'required',
                ],
                [

                    'firstname.required' => 'Please Input Name Field',
                    'lastname.required' => 'Please Input Name Field',
                    'email.required' => 'Please Input Name Field',
                    'phone.required' => 'Please Input Name Field',
                    'address.required' => 'Please Input Name Field',
                    'city.required' => 'Please Input Name Field',
                    'course.required' => 'Please Input Name Field',
                    'admission.required' => 'Please Input Name Field',
            ]
            );
            Registration::insert([

                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'course' => $request->course,
                'admission' => $request->admission,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Registration Successfully, You will be Contacted!',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }



}
