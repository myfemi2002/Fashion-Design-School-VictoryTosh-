<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Collections;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class CollectionsController extends Controller
{
    public function CollectionHome() {
        $data['allData'] = Collections::latest()->get();
        return view('backend.pages.collections.index', $data);
    }

    public function CollectionsAdd() {
        return view('backend.pages.collections.add_collections');
    }

    public function CollectionsStore(Request $request) {
        $validateData = $request->validate([
            'collection_name' => 'required',
            'collection_amount' => 'required',
            'collection_description' => 'required',
            'collection_category' => 'required',
            'collection_thumbnail' => 'required',
                ],
                [
                    'collection_name.required' => 'Please Input collection name',
                    'collection_amount.required' => 'Please Input collection amount',
                    'collection_description.required' => 'Please Input collection description',
                    'collection_category.required' => 'Please Input collection category',
                    'collection_thumbnail.min' => 'Image Longer Than 4 Characters',
        ]);
        $image = $request->file('collection_thumbnail');
        $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,780)->save('upload/product_images/thumbnail_images/'.$name_gen);
        $save_url = 'upload/product_images/thumbnail_images/'.$name_gen;

        // Collections::insert([
            $collection_id = Collections::insertGetId([
            'collection_name' => $request->collection_name,
            'collection_amount' => $request->collection_amount,
            'collection_description' => $request->collection_description,
            'collection_category' => $request->collection_category,
            'collection_thumbnail' => $save_url,
            'created_at' => Carbon::now()
        ]);
        // Multi Image Starts Here
        $images = $request->file('multi_image');
        foreach ($images as $img) {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(600,780)->save('upload/product_images/multi_images/'.$make_name);
        $uploadPath = 'upload/product_images/multi_images/'.$make_name;

        MultiImage::insert([
            'collection_id' => $collection_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),
        ]);// Multi Image Ends Here
    }
    $notification = array(
        'message' => 'Collection inserted Successfully',
        'alert-type' => 'success'
    );
    return Redirect()->route('collection.view')->with($notification);
}


    public function CollectionsEdit($id) {

        $multiImgs = MultiImage::where('collection_id',$id)->get();
        $editData = Collections::findOrFail($id);
        return view('backend.pages.collections.edit_collections', compact('editData','multiImgs'));
    }

    public function CollectionsUpdate(Request $request, $id) {
        $validateData = $request->validate([
            'collection_name' => 'required',
            'collection_amount' => 'required',
            'collection_description' => 'required',
            'collection_category' => 'required',
                ],
                [
                    'collection_name.required' => 'Please Input collection name',
                    'collection_amount.required' => 'Please Input collection amount',
                    'collection_description.required' => 'Please Input collection description',
                    'collection_category.required' => 'Please Input collection category',
        ]);

        Collections::find($id)->update([
            'collection_name' => $request->collection_name,
            'collection_amount' => $request->collection_amount,
            'collection_description' => $request->collection_description,
            'collection_category' => $request->collection_category,
            // 'collection_thumbnail' => $save_url,
            'created_at' => Carbon::now()

        ]);
        $notification = array(
            'message' => 'Collections Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('collection.view')->with($notification);

    }


    public function CollectionsUpdateMultimage(Request $request){
        $imgs = $request->multi_image;

        foreach ($imgs as $id => $img) {
            $imgDel= MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);
;

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(600,780)->save('upload/product_images/multi_images/'.$make_name);
            $uploadPath = 'upload/product_images/multi_images/'.$make_name;

            MultiImage::where('id',$id)->update([
                // 'collection_id' => $collection_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'MultiImage Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('collection.view')->with($notification);
}

    public function CollectionsUpdateThumbnail(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('collection_thumbnail');
        $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,780)->save('upload/product_images/thumbnail_images/'.$name_gen);
        $save_url = 'upload/product_images/thumbnail_images/'.$name_gen;

        Collections::findOrFail($pro_id)->update([
            // 'collection_id' => $collection_id,
            'collection_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Image Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('collection.view')->with($notification);

}

    public function CollectionsMultimageDelete($id){
        $oldimg = MultiImage::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Delete Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('collection.view')->with($notification);
    }

    public function CollectionsDelete($id) {
        // This line of code will delete image from the folder
        $collection = Collections::findOrFail($id);
        unlink($collection->collection_thumbnail);
        // Delete from the Database
        Collections::findOrFail($id)->delete();

        $images = MultiImage::where('collection_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImage::where('collection_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Collection Imags Deleted Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('collection.view')->with($notification);
    }

    public function CollectionPage(){
        $fschool= Collections::orderBy('id')->get();
        return view('pages.collections.collection', compact('fschool'));
    }

    public function CollectionDetails($id){
        $collectiondetails = Collections::findOrFail($id);
        $multiImg = MultiImage::where ('collection_id',$id)->get();
        return view('pages.collections.collection_details', compact('collectiondetails','multiImg'));
    }



}
