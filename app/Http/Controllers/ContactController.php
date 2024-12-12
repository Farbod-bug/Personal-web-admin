<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(8);

        return view('contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('warning', 'پیام کاربر با موفقیت حذف شد');
    }

    public function check(Contact $contact)
    {
        $contact->update([
            'status' => 1,
        ]);

        return redirect()->route('contact.index')->with('success', 'پیام کاربر بررسی شد');
    }

    public function checkeds()
    {
        $contacts = Contact::where('status', 1)->paginate(8);

        return view('contacts.checkeds', compact('contacts'));
    }

    public function uncheckeds()
    {
        $contacts = Contact::where('status', 0)->paginate(8);

        return view('contacts.uncheckeds', compact('contacts'));
    }
}
