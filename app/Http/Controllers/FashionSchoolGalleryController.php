<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FashionSchoolGallery;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class FashionSchoolGalleryController extends Controller
{

    public function FashionSchoolGalleryHome() {
        $data['allData'] = FashionSchoolGallery::latest()->get();
        return view('backend.pages.fashionschoolgallery.index', $data);
    }

    public function FashionSchoolGalleryAdd() {
        return view('backend.pages.fashionschoolgallery.add_fashionschoolgallery');
    }

    public function FashionSchoolGalleryStore(Request $request) {
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
        Image::make($image)->resize(1050, 680)->save('upload/fashion_slider/' . $name_gen);
        $last_img = 'upload/fashion_slider/' . $name_gen;

        FashionSchoolGallery::insert([
            'title' => $request->title,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Fashion School Slider Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolgallery.view')->with($notification);
    }

    public function FashionSchoolGalleryEdit($id) {
        $editData = FashionSchoolGallery::find($id);
        return view('backend.pages.fashionschoolgallery.edit_fashionschoolgallery', compact('editData'));
    }

    public function FashionSchoolGalleryUpdate(Request $request, $id) {
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
            Image::make($image)->resize(1050, 680)->save('upload/fashion_gallery/' . $name_gen);
            $last_img = 'upload/fashion_gallery/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            FashionSchoolGallery::find($id)->update([
                'title' => $request->title,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Fashion Gallery Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolgallery.view')->with($notification);
        } else {

            FashionSchoolGallery::find($id)->update([
                'title' => $request->title,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion Gallery Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolgallery.view')->with($notification);
        }
    }

    public function FashionSchoolGalleryDelete($id) {
        // This line of code will delete image from the folder
        $image = FashionSchoolGallery::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        FashionSchoolGallery::find($id)->delete();
        $notification = array(
            'message' => 'Fashion Gallery Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolgallery.view')->with($notification);
    }
}
