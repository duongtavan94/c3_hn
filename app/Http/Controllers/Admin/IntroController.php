<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Intro;

use App\Http\Requests\IntroRequest;

use Image;

use Illuminate\Support\Facades\Validator;



class IntroController extends Controller

{

    public function index()

    {

        $intro = Intro::orderBy('id', 'DESC')->paginate(10);



        return view('admin.intro.index', compact('intro'));

    }



    public function create()

    {



        return view('admin.intro.create');

    }



    public function postCreate(IntroRequest $req)

    {

        $intro              = new Intro;

        $intro->name_vi        = $req['name_vi'];

        $intro->name_en        = $req['name_en'];
        $intro->ngay            = $req['ngay'];
        $intro->position        = $req['position'];

        $intro->slug        = str_slug($req['name_vi']);

        $intro->status      = (is_null($req['status']) ? '0' : '1');
        $intro->cc      = (is_null($req['cc']) ? '0' : '1');

        $intro->description_vi = $req['description_vi'];

        $intro->description_en = $req['description_en'];

        $intro->title_vi = $req['title_vi'];

        $intro->title_en = $req['title_en'];

        $intro->title_seo   = $req['title_seo'];

        $intro->meta_key    = $req['meta_key'];

        $intro->meta_des    = $req['meta_des'];

        if ($req->hasFile('image')) {

            $image = $req->file('image');

            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();

            Image::make($image)->save(public_path('upload/product/'.$filename));

            $intro->image = ('upload/product/'.$filename);

        }

        $intro->save();



        return redirect()->route('admin.intro.index');

    }



    public function update($slug)

    {

        $intro = Intro::where('slug', $slug)->first();



        return view('admin.intro.edit', compact('intro'));

    }



    public function postUpdate($slug, Request $req)

    {

        $intro              = Intro::where('slug', $slug)->first();

        $intro->name_vi        = $req['name_vi'];

        $intro->name_en        = $req['name_en'];

        $intro->slug        = str_slug($req['name_vi']);

        $intro->status      = (is_null($req['status']) ? '0' : '1');
        $intro->cc      = (is_null($req['cc']) ? '0' : '1');

        $intro->description_vi = $req['description_vi'];

        $intro->description_en = $req['description_en'];

        $intro->title_vi = $req['title_vi'];

        $intro->title_en = $req['title_en'];
        if ($req['ngay'] != null) {
            $intro->ngay            = $req['ngay'];
        }

        $intro->position        = $req['position'];

        $intro->title_seo   = $req['title_seo'];

        $intro->meta_key    = $req['meta_key'];

        $intro->meta_des    = $req['meta_des'];

        if ($req->hasFile('image')) {

            $image = $req->file('image');

            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();

            Image::make($image)->save(public_path('upload/product/'.$filename));

            $intro->image = ('upload/product/'.$filename);

        }

        $validatedData = $req->validate([

            'name_vi'     => 'required|unique:intros,name_vi,' .$intro->id,

        ]);

        $intro->save();



        return redirect()->route('admin.intro.index')->with('success', 'Sửa thành công');

    }



    public function destroy($id)

    {

        $result = Intro::findOrFail($id);

        if (file_exists($result->image))

        {

            unlink($result->image);

        }

        $result->delete();



        return redirect()->back()->with('success', 'Xóa thành công');

    }



    public function status(Request $req)

    {

        if ($req->ajax())

        {

            $result = Intro::find($req->id);

            if ($result->status == 0)

            {

                $result->status = 1;

            } else {

                $result->status = 0;

            }

            $result->save();



            return response($result);

        }

    }
    public function cc(Request $req)

    {

        if ($req->ajax())

        {

            $result = Intro::find($req->id);

            if ($result->cc == 0)

            {

                $result->cc = 1;

            } else {

                $result->cc = 0;

            }

            $result->save();



            return response($result);

        }

    }

}

