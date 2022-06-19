<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\HomeAboutUs;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeAboutUsController extends Controller
{
    public function HomeAboutUs() {
        $data['allData'] = HomeAboutUs::latest()->get();
        return view('backend.homeaboutus.index', $data);
    }

    public function HomeAboutAdd() {
        return view('backend.homeaboutus.add_homeaboutus');
    }

    public function HomeAboutStore(Request $request) {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_link' => 'required',
                ],
                [
                    'title.required' => 'Please Input title',
                    'description.required' => 'Please Input description',
                    'video_link.required' => 'Please Input video link',
        ]);

        HomeAboutUs::insert([
            'title' => $request->title,
            'description' => $request->description,
            'video_link' => $request->video_link,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Home About Us Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homeaboutus.view')->with($notification);
    }

    public function HomeAboutEdit($id) {
        $editData = HomeAboutUs::find($id);
        return view('backend.homeaboutus.edit_homeaboutus', compact('editData'));
    }


public function HomeAboutUpdate(Request $request, $id) {

    HomeAboutUs::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'video_link' => $request->video_link,
        'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Home About Us Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homeaboutus.view')->with($notification);
    }

    public function HomeAboutDelete($id){
        HomeAboutUs::find($id)->delete();
        $notification = array(
            'message' => 'Home About Us Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('homeaboutus.view')->with($notification);
    }










}
