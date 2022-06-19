<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
fashionschoolgallery

class FashionSchoolPackagesController extends Controller
{
    public function FashionSchoolPackagesHome() {
        $data['allData'] = FashionSchoolPackage::latest()->get();
        return view('backend.pages.fashionschoolpackages.index', $data);
    }

    public function FashionSchoolPackagesAdd() {
        return view('backend.pages.fashionschoolpackages.add_fashionschoolpackages');
    }

    public function FashionSchoolPackagesStore(Request $request) {
        $validateData = $request->validate([
            'fsclass' => 'required',
            'description' => 'required',
            'period' => 'required',
            'price' => 'required',
            'image' => 'required',
                ],
                [
                    'fsclass.required' => 'Please Input class',
                    'description.required' => 'Please Input description',
                    'period.required' => 'Please Input period',
                    'price.required' => 'Please Input price',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(76, 74)->save('upload/fashion_school_package/' . $name_gen);
        $last_img = 'upload/fashion_school_package/' . $name_gen;

        FashionSchoolPackage::insert([
            'fsclass' => $request->fsclass,
            'description' => $request->description,
            'period' => $request->period,
            'price' => $request->price,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Fashion School Package Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolpackages.view')->with($notification);
    }

    public function FashionSchoolPackagesEdit($id) {
        $editData = FashionSchoolPackage::find($id);
        return view('backend.pages.fashionschoolpackages.edit_fashionschoolpackages', compact('editData'));
    }

    public function FashionSchoolPackagesUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'fsclass' => 'required',
            'description' => 'required',
            'period' => 'required',
            'price' => 'required',
            'image' => 'required',
                ],
                [
                    'fsclass.required' => 'Please Input class',
                    'description.required' => 'Please Input description',
                    'period.required' => 'Please Input period',
                    'price.required' => 'Please Input price',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(76, 74)->save('upload/fashion_school_package/' . $name_gen);
            $last_img = 'upload/fashion_school_package/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            FashionSchoolPackage::find($id)->update([
                'fsclass' => $request->fsclass,
                'description' => $request->description,
                'period' => $request->period,
                'price' => $request->price,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion School Package Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolpackages.view')->with($notification);
        } else {

            FashionSchoolPackage::find($id)->update([
                'fsclass' => $request->fsclass,
                'description' => $request->description,
                'period' => $request->period,
                'price' => $request->price,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Fashion School Package Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('fashionschoolpackages.view')->with($notification);
        }
    }

    public function FashionSchoolPackagesDelete($id) {
        // This line of code will delete image from the folder
        $image = FashionSchoolPackage::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        FashionSchoolPackage::find($id)->delete();
        $notification = array(
            'message' => 'Fashion School Package Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('fashionschoolpackages.view')->with($notification);
    }




}
