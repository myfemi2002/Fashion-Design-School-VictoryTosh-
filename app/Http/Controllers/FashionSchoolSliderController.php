<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FashionSchoolSlider;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class FashionSchoolSliderController extends Controller
{
    public function FashionSchoolSliderHome() {
        $data['allData'] = FashionSchoolSlider::latest()->get();
        return view('backend.pages.fashion_school_slider.index', $data);
    }

    public function FashionSchoolSliderAdd() {
        return view('backend.pages.fashion_school_slider.add_fashion_school_slider');
    }

    public function FashionSchoolSliderStore(Request $request) {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1170, 700)->save('upload/fashion_slider/' . $name_gen);
        $last_img = 'upload/fashion_slider/' . $name_gen;

        FashionSchoolSlider::insert([
            'title' => $request->title,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Fashion School Slider Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolslider.view')->with($notification);
    }

    public function FashionSchoolSliderEdit($id) {
        $editData = FashionSchoolSlider::find($id);
        return view('backend.pages.fashion_school_slider.edit_fashion_school_slider', compact('editData'));
    }

    public function FashionSchoolSliderUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1170, 700)->save('upload/fashion_slider/' . $name_gen);
            $last_img = 'upload/fashion_slider/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            FashionSchoolSlider::find($id)->update([
                'title' => $request->title,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Fashion Slider Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolslider.view')->with($notification);
        } else {

            FashionSchoolSlider::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion Slider Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolslider.view')->with($notification);
        }
    }

    public function FashionSchoolSliderDelete($id) {
        // This line of code will delete image from the folder
        $image = FashionSchoolSlider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        FashionSchoolSlider::find($id)->delete();
        $notification = array(
            'message' => 'Fashion Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolslider.view')->with($notification);
    }

}
