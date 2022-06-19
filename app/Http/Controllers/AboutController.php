<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function AboutHome() {
        $data['allData'] = About::latest()->get();
        return view('backend.pages.about.index', $data);
    }

    public function AboutAdd() {
        return view('backend.pages.about.add_about');
    }

    public function AboutStore(Request $request) {
        $validateData = $request->validate([
            'section_title' => 'required',
            'welcome_note' => 'required',
            'about_image' => 'required',
            'leadership_name' => 'required',
            'leadership_position' => 'required',
            'leadership_image' => 'required',
                ],
                [
                    'section_title.required' => 'Please Input section title',
                    'welcome_note.required' => 'Please Input welcome note',
                    'about_image.min' => 'Image Longer Than 4 Characters',
                    'leadership_name.required' => 'Please Input leadership name',
                    'leadership_position.required' => 'Please Input leadership position',
                    'leadership_image.min' => 'Image Longer Than 4 Characters',
        ]);

        $img = $request->file('about_image');
        $name_gen = hexdec(uniqid()). '.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(772,660)->save('upload/about_image/'.$name_gen);
        $save_url = 'upload/about_image/'.$name_gen;

        $image = $request->file('leadership_image');
        $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(480,480)->save('upload/leadership_image/'.$name_gen);
        $uploadpath = 'upload/leadership_image/'.$name_gen;

        About::insert([
            'section_title' => $request->section_title,
            'welcome_note' => $request->welcome_note,
            'about_image' => $save_url,
            'leadership_name' => $request->leadership_name,
            'leadership_position' => $request->leadership_position,
            'leadership_facebook' => $request->leadership_facebook,
            'leadership_twitter' => $request->leadership_twitter,
            'leadership_instragram' => $request->leadership_instragram,
            'leadership_image' => $uploadpath,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'About Information Added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('about.view')->with($notification);
    }

    public function AboutEdit($id) {
        $editData = About::find($id);
        return view('backend.pages.about.edit_about', compact('editData'));
    }

    public function AboutUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'about_image' => 'required',
            'leadership_image' => 'required',
                ],
                [
            'about_image.min' => 'Image Longer Than 4 Characters',
            'leadership_image.min' => 'Image Longer Than 4 Characters',
        ]);
        $old_img = $request->old_img;
        unlink($old_img);
        $img = $request->file('about_image');
        $name_gen = hexdec(uniqid()). '.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(772, 660)->save('upload/about_image/'.$name_gen);
        $save_url = 'upload/about_image/'.$name_gen;

        $old_image = $request->old_image;
        unlink($old_image);
        $image = $request->file('leadership_image');
        $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(480, 480)->save('upload/leadership_image/'.$name_gen);
        $uploadpath = 'upload/leadership_image/'.$name_gen;

                About::find($id)->update([
                'section_title' => $request->section_title,
                'welcome_note' => $request->welcome_note,
                'about_image' => $save_url,
                'leadership_name' => $request->leadership_name,
                'leadership_position' => $request->leadership_position,
                'leadership_facebook' => $request->leadership_facebook,
                'leadership_twitter' => $request->leadership_twitter,
                'leadership_instragram' => $request->leadership_instragram,
                'leadership_image' => $uploadpath,
                'created_at' => Carbon::now()
            ]);

                $notification = array(
                'message' => 'About Updated Successfully',
                'alert-type' => 'success'
            );
                return Redirect()->route('about.view')->with($notification);
            }

    public function AboutDelete($id) {
        // This line of code will delete image from the folder
        $img = About::find($id);
        $old_img = $img->about_image;
        unlink($old_img);

        // This line of code will delete image from the folder
        $image = About::find($id);
        $old_image = $image->leadership_image;
        unlink($old_image);

        // Delete from the Database
        About::find($id)->delete();
        $notification = array(
            'message' => 'About Deleted Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('about.view')->with($notification);
    }


    public function AboutPage(){
        $aboutpage = DB::table('abouts')->first();
        return view('pages.about.about', compact('aboutpage'));
    }

}
