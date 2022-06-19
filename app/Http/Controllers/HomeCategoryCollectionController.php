<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HomeCategoryCollection;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeCategoryCollectionController extends Controller
{
    public function HomeCategory() {
        $data['allData'] = HomeCategoryCollection::latest()->get();
        return view('backend.homecategory.index', $data);
    }

    public function HomeCategoryAdd() {
        return view('backend.homecategory.add_homecategory');
    }

    public function HomeCategoryStore(Request $request) {
        $validateData = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'image' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'name.required' => 'Please Input name',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(640, 902)->save('upload/homecategory/' . $name_gen);
        $last_img = 'upload/homecategory/' . $name_gen;

        HomeCategoryCollection::insert([
            'title' => $request->title,
            'name' => $request->name,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Home Category Collection Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homecategorycollection.view')->with($notification);
    }

    public function HomeCategoryEdit($id) {
        $editData = HomeCategoryCollection::find($id);
        return view('backend.homecategory.edit_homecategory', compact('editData'));
    }

    public function HomeCategoryUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'title'=>'required',
            'name' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'name.required' => 'Please Input name',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file(' image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(640, 902)->save('upload/homecategory/' . $name_gen);
            $last_img = 'upload/homecategory/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            HomeCategoryCollection::find($id)->update([
                'title' => $request->title,
                'name' => $request->name,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Category Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homecategorycollection.view')->with($notification);
        } else {

            HomeCategoryCollection::find($id)->update([
                'title' => $request->title,
                'name' => $request->name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Category Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homecategorycollection.view')->with($notification);
        }
    }

    public function HomeCategoryDelete($id) {
        // This line of code will delete image from the folder
        $image = HomeCategoryCollection::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        HomeCategoryCollection::find($id)->delete();
        $notification = array(
            'message' => 'Home Category Collection Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homecategorycollection.view')->with($notification);
    }
}
