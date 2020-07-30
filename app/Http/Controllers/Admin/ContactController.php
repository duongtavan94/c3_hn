<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Excel;
use App\Exports\DataExport;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy('id', 'DESC')->get();

        return view('admin.contact.index', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }
     public function show($id)
    {
        $result = Contact::findOrFail($id);

        return view('admin.contact.show', compact('result'));

    }
    public function postStatus(Request $req, $id)
    {
        $bill = Contact::where('id', $id)->first();
        $bill->status = $req->status;
        $bill->save();

        return back()->with('success', 'Thao tác thành công');
    }

    public function exportExcel()
    {
        return Excel::download(new DataExport, 'danhsach.xlsx');
    }
}
