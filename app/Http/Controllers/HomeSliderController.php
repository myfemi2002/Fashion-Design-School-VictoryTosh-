<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeSliderController extends Controller
{

    public function HomeSlider() {
        // $data['allData'] = Slider::all();
        $data['allData'] = Slider::latest()->get();
        return view('backend.homeslider.index', $data);
    }

    public function SliderAdd() {
        return view('backend.homeslider.add_slider');
    }

    public function SliderStore(Request $request) {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'description.required' => 'Please Input Description',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1080)->save('upload/slider/' . $name_gen);
        $last_img = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('slider.view')->with($notification);
    }

    public function SliderEdit($id) {
        $editData = Slider::find($id);
        return view('backend.homeslider.edit_slider', compact('editData'));
    }

    public function SliderUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'description.required' => 'Please Input Description',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save('upload/slider/' . $name_gen);
            $last_img = 'upload/slider/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('slider.view')->with($notification);
        } else {

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('slider.view')->with($notification);
        }
    }

    public function SliderDelete($id) {
        // This line of code will delete image from the folder
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        Slider::find($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('slider.view')->with($notification);
    }
}
