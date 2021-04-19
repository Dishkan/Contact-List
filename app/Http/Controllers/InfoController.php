<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{

    public function index() {

        $infos = Info::all();

        return view('contacts.myinfo', compact(['infos']));
    }

    public function create()
    {
        $info = Contact::all();
        return view('contacts.info_create_content', compact(['info']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'info_number' => array(
                'regex: (998([\d]{9})$)',
                'unique:infos',
                'required'
                ),
            'info_email' => 'email|unique:infos|nullable',
        ]);

        Info::create($request->all());

        return redirect('/');
    }

    public function edit($id)
    {
        $info = Info::find($id);

        return view('contacts.myinfo_edit_content', compact(['info']));
    }

    public function update(Request $request, $info)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($data, [
            'info_number' => array(
                'regex: (998([\d]{9})$)',
                'unique:infos,info_number,' . $info,
                'nullable'
            ),
            'info_email' => 'nullable|email|unique:infos,info_email,' . $info,
        ]);

        if ($validator->fails()) {
            return back()->with($data)->withErrors($validator);
        }

        Info::where('id', $info)->update($data);

        return redirect('info')->with($data);
    }

    public function destroy($id)
    {
        Info::where('id', $id)->delete();

        return redirect('info');
    }
}
