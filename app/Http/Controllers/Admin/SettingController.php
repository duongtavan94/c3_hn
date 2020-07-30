<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Setting;

use App\Models\Bill;

use App\Http\Requests\SettingRequest;

use File;

use Image;

class SettingController extends Controller

{

    public function index()

    {

        $settings = Setting::first();

        if($settings == null)

        {

            $settings       = new Setting;

            $settings->name_vi = 'Nhập tên công ty';

            $settings->name_en = 'Name city';

            $settings->save();

        }

        File::exists("robots.txt");

        $file = File::get("robots.txt");



        return view('admin.setting.index', compact('settings', 'file'));

    }



    public function update(Request $req)

    {

        $settings            = Setting::first();

        $settings->name_vi      = $req['name_vi'];

        $settings->name_en      = $req['name_en'];

        $settings->email     = $req['email'];

        $settings->address_vi   = $req['address_vi'];

        $settings->address_en   = $req['address_en'];

        $settings->website   = $req['website'];

        $settings->hotline   = $req['hotline'];
        $settings->phone   = $req['phone'];

        $settings->thead     = $req['thead'];

        $settings->tbody     = $req['tbody'];

        $settings->title_seo = $req['title_seo'];

        $settings->meta_des  = $req['meta_des'];

        $settings->meta_key  = $req['meta_key'];

        $robot               = $req['robot'];

        $settings->fb   = $req['fb'];
        $settings->yt   = $req['yt'];
        $settings->sky   = $req['sky'];
        $settings->gg   = $req['gg'];
        $settings->ig   = $req['ig'];
        $settings->tw   = $req['tw'];
        $settings->ar   = $req['ar'];
        $settings->ios   = $req['ios'];
        $settings->pc   = $req['pc'];
        $settings->cr   = $req['cr'];
        $settings->td_vi   = $req['td_vi'];
        $settings->td_en   = $req['td_en'];
        $settings->mt_vi   = $req['mt_vi'];
        $settings->mt_en   = $req['mt_en'];
        $settings->bando   = $req['bando'];


        File::put("robots.txt", $robot);

        if($req->hasFile('logo')){

            if(file_exists($settings->logo))

            {

                unlink($settings->logo);

            }

            $logo = $req->file('logo');

            $filename = date('Y_d_m_H_i_s').'-'. $logo->getClientOriginalName();

            Image::make($logo)->save(public_path('images/upload/'.$filename));

            $settings->logo = ('images/upload/'.$filename);

        }
        if($req->hasFile('logo2')){

            if(file_exists($settings->logo2))

            {

                unlink($settings->logo2);

            }

            $logo2 = $req->file('logo2');

            $filename = date('Y_d_m_H_i_s').'-'. $logo2->getClientOriginalName();

            Image::make($logo2)->save(public_path('images/upload/'.$filename));

            $settings->logo2 = ('images/upload/'.$filename);

        }
        if($req->hasFile('logo3')){

            if(file_exists($settings->logo3))

            {

                unlink($settings->logo3);

            }

            $logo3 = $req->file('logo3');

            $filename = date('Y_d_m_H_i_s').'-'. $logo3->getClientOriginalName();

            Image::make($logo3)->save(public_path('images/upload/'.$filename));

            $settings->logo3 = ('images/upload/'.$filename);

        }



        if($req->hasFile('anh1')){

            if(file_exists($settings->anh1))

            {

                unlink($settings->anh1);

            }

            $anh1 = $req->file('anh1');

            $filename = date('Y_d_m_H_i_s').'-'. $anh1->getClientOriginalName();

            Image::make($anh1)->save(public_path('images/upload/'.$filename));

            $settings->anh1 = ('images/upload/'.$filename);

        }

        if($req->hasFile('anh2')){

            if(file_exists($settings->anh2))

            {

                unlink($settings->anh2);

            }

            $anh2 = $req->file('anh2');

            $filename = date('Y_d_m_H_i_s').'-'. $anh2->getClientOriginalName();

            Image::make($anh2)->save(public_path('images/upload/'.$filename));

            $settings->anh2 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh3')){

            if(file_exists($settings->anh3))

            {

                unlink($settings->anh3);

            }

            $anh3 = $req->file('anh3');

            $filename = date('Y_d_m_H_i_s').'-'. $anh3->getClientOriginalName();

            Image::make($anh3)->save(public_path('images/upload/'.$filename));

            $settings->anh3 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh4')){

            if(file_exists($settings->anh4))

            {

                unlink($settings->anh4);

            }

            $anh4 = $req->file('anh4');

            $filename = date('Y_d_m_H_i_s').'-'. $anh4->getClientOriginalName();

            Image::make($anh4)->save(public_path('images/upload/'.$filename));

            $settings->anh4 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh5')){

            if(file_exists($settings->anh5))

            {

                unlink($settings->anh5);

            }

            $anh5 = $req->file('anh5');

            $filename = date('Y_d_m_H_i_s').'-'. $anh5->getClientOriginalName();

            Image::make($anh5)->save(public_path('images/upload/'.$filename));

            $settings->anh5 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh5')){

            if(file_exists($settings->anh5))

            {

                unlink($settings->anh5);

            }

            $anh5 = $req->file('anh5');

            $filename = date('Y_d_m_H_i_s').'-'. $anh5->getClientOriginalName();

            Image::make($anh5)->save(public_path('images/upload/'.$filename));

            $settings->anh5 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh6')){

            if(file_exists($settings->anh6))

            {

                unlink($settings->anh6);

            }

            $anh6 = $req->file('anh6');

            $filename = date('Y_d_m_H_i_s').'-'. $anh6->getClientOriginalName();

            Image::make($anh6)->save(public_path('images/upload/'.$filename));

            $settings->anh6 = ('images/upload/'.$filename);

        }
        if($req->hasFile('anh7')){

            if(file_exists($settings->anh7))

            {

                unlink($settings->anh7);

            }

            $anh7 = $req->file('anh7');

            $filename = date('Y_d_m_H_i_s').'-'. $anh7->getClientOriginalName();

            Image::make($anh7)->save(public_path('images/upload/'.$filename));

            $settings->anh7 = ('images/upload/'.$filename);

        }
        if($req->hasFile('icon')){

            if(file_exists($settings->icon))

            {

                unlink($settings->icon);

            }

            $icon = $req->file('icon');

            $filename = date('Y_d_m_H_i_s').'-'. $icon->getClientOriginalName();

            Image::make($icon)->save(public_path('images/upload/'.$filename));

            $settings->icon = ('images/upload/'.$filename);

        }

        $settings->save();

        return redirect()->route('admin.setting');

    }









    public function index2()

    {

        $settings = Bill::first();

        if($settings == null)

        {

            $settings       = new Bill;

            $settings->name_vi = 'Giới thiệu';

            $settings->name_en = 'About';

            $settings->save();

        }



        return view('admin.setting.index2', compact('settings', 'file'));

    }



    public function update2(Request $req)

    {

        $settings            = Bill::first();

        $settings->name_vi      = $req['name_vi'];

        $settings->name_en      = $req['name_en'];

        $settings->title_vi      = $req['title_vi'];

        $settings->title_en      = $req['title_en'];

        $settings->description_en      = $req['description_en'];

        $settings->description2_en      = $req['description2_en'];

        $settings->description3_en      = $req['description3_en'];

        $settings->description4_en      = $req['description4_en'];

        $settings->description_vi      = $req['description_vi'];

        $settings->description2_vi      = $req['description2_vi'];

        $settings->description3_vi      = $req['description3_vi'];

        $settings->description4_vi      = $req['description4_vi'];

        

        $settings->save();

        return back();

    }

    public function index3()

    {

        $settings = Bill::where('id', 2)->first();


        return view('admin.setting.index3', compact('settings', 'file'));

    }



    public function update3(Request $req)

    {

        $settings            = Bill::where('id', 2)->first();

        $settings->name_vi      = $req['name_vi'];

        $settings->name_en      = $req['name_en'];

        $settings->title_vi      = $req['title_vi'];

        $settings->title_en      = $req['title_en'];

        $settings->description_en      = $req['description_en'];

        $settings->description2_en      = $req['description2_en'];

        $settings->description3_en      = $req['description3_en'];

        $settings->description4_en      = $req['description4_en'];

        $settings->description_vi      = $req['description_vi'];

        $settings->description2_vi      = $req['description2_vi'];

        $settings->description3_vi      = $req['description3_vi'];

        $settings->description4_vi      = $req['description4_vi'];

        

        $settings->save();

        return back();

    }

}

