<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        return view('hakateq_admin.contact', compact('contacts'));
    }

    public function sendContactForm(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);


        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);



        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);


        $data['userMessage'] = $data['message'];
        unset($data['message']);


        Mail::send('hakateq_admin.email', $data, function ($message) use ($data) {
            $message->to('kyomuhendoisihaka1@gmail.com')
                    ->subject('New Contact Message from ' . $data['name']);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact Message is Deleted');
    }
}
