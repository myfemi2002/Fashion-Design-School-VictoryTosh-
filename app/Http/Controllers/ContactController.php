<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\AdminContact;
use Illuminate\Support\Carbon;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function ContactPage()
    {
        $contactpage = DB::table('contacts')->first();
        return view('pages.contact.contact', compact('contactpage'));
    }

    public function ContactForm(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'email:rfc,dns',
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'subject' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Please Input Name Field',
                'email.required' => 'Please Input Email Field',
                'phone_number.required' => 'Please Input Phone Number Field',
                'subject.required' => 'Please Input Subject Field',
                'message.required' => 'Please Input Message Field',
        ]
        );
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Thanks for contacting us!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function ContactMessageDelete($id){
        Contact::find($id)->delete();
        $notification = array(
            'message' => 'Contact Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('contactmessage.view')->with($notification);
    }

// Admin contact Message  veiw
    public function MessageContactIndex() {
        $data['allData'] = Contact::latest()->get();
        return view('backend.pages.contact.messageindex', $data);
    }


public function ContactHome(){
        $data['allData'] = AdminContact::latest()->get();
        return view('backend.pages.contact.index', $data);

}
    public function ContactAdd() {
    return view('backend.pages.contact.add_contact');
}

    public function ContactStore(Request $request)
{
    AdminContact::insert([
        'address' => $request->address,
        'working_hours' => $request->working_hours,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instragram' => $request->instragram,
        'linkedin' => $request->linkedin,
        'created_at' => Carbon::now()
    ]);


    $notification = array(
        'message' => 'Contact  Added Successfully',
        'alert-type' => 'success'
    );
    return Redirect()->route('contact.view')->with($notification);
    }

public function ContactEdit($id) {
    $editData = AdminContact::find($id);
    return view('backend.pages.contact.edit_contact', compact('editData'));
}


public function ContactUpdate(Request $request, $id) {

    AdminContact::find($id)->update([
            'address' => $request->address,
            'working_hours' => $request->working_hours,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instragram' => $request->instragram,
            'linkedin' => $request->linkedin,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Contact Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('contact.view')->with($notification);
    }

    public function ContactDelete($id){
        AdminContact::find($id)->delete();
        $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('contact.view')->with($notification);
    }

}
