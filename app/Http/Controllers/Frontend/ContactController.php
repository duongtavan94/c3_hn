<?php



namespace App\Http\Controllers\Frontend;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Contact;



class ContactController extends Controller

{

    public function index()

    {

        return view('frontend.contact');

    }



    public function postContact(Request $req)

    {


        $contact          = new Contact;

        $contact->name    = $req['name'];
        $contact->phone    = $req['phone'];
        $contact->namsinh    = $req['namsinh'];
        $contact->totnghiep    = $req['totnghiep'];
        $contact->address    = $req['address'];
        $contact->phuhuynh    = $req['phuhuynh'];
        $contact->phone2    = $req['phone2'];
        $contact->email   = $req['email'];
        $contact->lop   = $req['lop'];
        $contact->save();



        return back()->with('success', 'Gửi thành công');

    }

}

