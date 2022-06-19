<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FashionSchool;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class FashionSchoolController extends Controller
{
    public function FashionSchool() {
        // $data['allData'] = Slider::all();
        $data['allData'] = FashionSchool::latest()->get();
        return view('backend.pages.fashion_school.index', $data);
    }

    public function FashionSchoolAdd() {
        return view('backend.pages.fashion_school.add_fashion_school');
    }


    public function FashionSchoolStore(Request $request) {
        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'subtitle.required' => 'Please Input subtitle',
                    'name.required' => 'Please Input name',
                    'price.required' => 'Please Input price',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1170, 700)->save('upload/fashion_school/' . $name_gen);
        $last_img = 'upload/fashion_school/' . $name_gen;

        FashionSchool::insert([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Fashion School Slide Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homesellercollection.view')->with($notification);
    }

    public function FashionSchoolEdit($id) {
        $editData = FashionSchool::find($id);
        return view('backend.pages.fashion_school.edit_fashion_school', compact('editData'));
    }

    public function FashionSchoolUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'title'=>'required',
            'subtitle' => 'required',
            'name' => 'required',
            'price' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'subtitle.required' => 'Please Input subtitle',
                    'name.required' => 'Please Input name',
                    'price.required' => 'Please Input price',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1170, 700)->save('upload/fashion_school/' . $name_gen);
            $last_img = 'upload/fashion_school/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            FashionSchool::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion School Slide Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschool.view')->with($notification);
        } else {

            FashionSchool::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'name' => $request->name,
                'price' => $request->price,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion School Slide Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschool.view')->with($notification);
        }
    }

    public function FashionSchoolDelete($id) {
        // This line of code will delete image from the folder
        $image = FashionSchool::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        FashionSchool::find($id)->delete();
        $notification = array(
            'message' => 'Fashion School Slide Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschool.view')->with($notification);
    }
    public function FashionSchoolPage(){
        $fschool= FashionSchool::orderBy('id')->get();
        return view('pages.school.fashionschool', compact('fschool'));
    }
}
