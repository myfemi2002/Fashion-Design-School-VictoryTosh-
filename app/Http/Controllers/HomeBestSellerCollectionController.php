<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HomeBestCollection;
use Illuminate\Support\Carbon;
 use Auth;
use Image;

class HomeBestSellerCollectionController extends Controller
{
    public function HomeBestCollection() {
        $data['allData'] = HomeBestCollection::latest()->get();
        return view('backend.homebestseller.index', $data);
    }

    public function HomeBestCollectionAdd() {
        return view('backend.homebestseller.add_homebestseller');
    }

    public function HomeBestCollectionStore(Request $request) {
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
        Image::make($image)->resize(500, 650)->save('upload/homebestseller/' . $name_gen);
        $last_img = 'upload/homebestseller/' . $name_gen;

        HomeBestCollection::insert([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Home Best Seller Collection Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homesellercollection.view')->with($notification);
    }

    public function HomeBestCollectionEdit($id) {
        $editData = HomeBestCollection::find($id);
        return view('backend.homebestseller.edit_homebestseller', compact('editData'));
    }

    public function HomeBestCollectionUpdate(Request $request, $id) {
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
            Image::make($image)->resize(500, 650)->save('upload/homebestseller/' . $name_gen);
            $last_img = 'upload/homebestseller/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            HomeBestCollection::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Best Seller Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homesellercollection.view')->with($notification);
        } else {

            HomeBestCollection::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'name' => $request->name,
                'price' => $request->price,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Best Seller Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homesellercollection.view')->with($notification);
        }
    }

    public function HomeBestCollectionDelete($id) {
        // This line of code will delete image from the folder
        $image = HomeBestCollection::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        HomeBestCollection::find($id)->delete();
        $notification = array(
            'message' => 'Home Best Seller Collection Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homesellercollection.view')->with($notification);
    }
}
