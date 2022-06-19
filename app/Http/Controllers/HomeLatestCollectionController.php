<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HomeCollection;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeLatestCollectionController extends Controller
{
    public function HomeCollection() {
        // $data['allData'] = Slider::all();
        $data['allData'] = HomeCollection::latest()->get();
        return view('backend.homecollection.index', $data);
    }

    public function HomeCollectionAdd() {
        return view('backend.homecollection.add_homecollection');
    }

    public function HomeCollectionStore(Request $request) {
        $validateData = $request->validate([
            'section_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
                ],
                [
                    'section_title.required' => 'Please Input title',
                    'title.required' => 'Please Input title',
                    'description.required' => 'Please Input Description',
                    'image.min' => 'Image Longer Than 4 Characters',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1220, 800)->save('upload/homecollection/' . $name_gen);
        $last_img = 'upload/homecollection/' . $name_gen;

        HomeCollection::insert([
            'section_title' => $request->section_title,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Home Latest Collection Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homecollection.view')->with($notification);
    }

    public function HomeCollectionEdit($id) {
        $editData = HomeCollection::find($id);
        return view('backend.homecollection.edit_homecollection', compact('editData'));
    }

    public function HomeCollectionUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'section_title'=>'required',
            'title' => 'required',
            'description' => 'required',
                ],
                [
                    'section_title.required' => 'Please Input section title',
                    'title.required' => 'Please Input title',
                    'description.required' => 'Please Input Description',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1220, 800)->save('upload/homecollection/' . $name_gen);
            $last_img = 'upload/homecollection/' . $name_gen;

            // This line of code will delete image from the folder
            unlink($old_image);

            HomeCollection::find($id)->update([
                'section_title' => $request->section_title,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Latest Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homecollection.view')->with($notification);
        } else {

            HomeCollection::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Home Latest Collection Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('homecollection.view')->with($notification);
        }
    }

    public function HomeCollectionDelete($id) {
        // This line of code will delete image from the folder
        $image = HomeCollection::find($id);
        $old_image = $image->image;
        unlink($old_image);

        // Delete from the Database
        HomeCollection::find($id)->delete();
        $notification = array(
            'message' => 'Home Latest Collection Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homecollection.view')->with($notification);
    }
}
