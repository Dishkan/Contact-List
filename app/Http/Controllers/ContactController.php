<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('contacts.mycontacts', compact(['contacts']));
    }


    public function create()
    {
        return view('contacts.mycontacts_create_content');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:contacts',
            'number' => array(
                'required:max:15',
                'regex: (998([\d]{9})$)',
                'unique:contacts'),
            'second_number' => array(
                'nullable:max:15',
                'regex: (998([\d]{9})$)',
                'unique:contacts'),
            'email' => 'required|email|unique:contacts',
            'second_email' => 'nullable|email|unique:contacts'
        ]);

        Contact::create($request->all());

        return redirect('/');
    }

    public function search(Request $request)
    {

        $q = $request->input('q');

        $contacts = Contact::where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('number', 'LIKE', '%' . $q . '%')
            ->orWhere('second_number', 'LIKE', '%' . $q . '%')
            ->orWhere('email', 'LIKE', '%' . $q . '%')
            ->orWhere('second_email', 'LIKE', '%' . $q . '%')
            ->get();

        if (count($contacts) > 0) {
            return view('contacts.search')->with(['contacts' => $contacts, 'q' => $q])
                ->withDetails($contacts)->withQuery($q)->render();
        } else {

            return view('contacts.search_notfound')->withQuery($q)->withMessage('No Details found. Try to search again !');
        }

    }


    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('contacts.mycontacts_create_content', compact(['contact']));
    }


    public function update(Request $request, $contact)
    {

        $data = $request->except('_token', '_method');

        $validator = Validator::make($data, [
            'name' => 'required|max:255|unique:contacts,name,' . $contact,
            'number' => array(
                'required:max:15',
                'regex: (998([\d]{9})$)',
                'unique:contacts,number,' . $contact,
            ),
            'second_number' => array(
                'nullable:max:15',
                'regex: (998([\d]{9})$)',
                'unique:contacts,number',
                'unique:contacts,second_number,' . $contact,
            ),
            'email' => 'required|email|unique:contacts,email,' . $contact,
            'second_email' => array(
                'nullable',
                'email',
                'unique:contacts,email',
                'unique:contacts,second_email,' . $contact,
            ),
        ]);

        if ($validator->fails()) {
            return back()->with($data)->withErrors($validator);
        }

        Contact::where('id', $contact)->update($data);

        return redirect('/')->with($data);
    }


    public function destroy($contact)
    {

        Contact::where('id', $contact)->delete();

        return redirect('/');

    }
}
