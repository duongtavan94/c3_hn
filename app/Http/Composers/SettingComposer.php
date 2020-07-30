<?php

    namespace App\Http\Composers;



    use Illuminate\Contracts\View\View;

    use App\Models\Setting;



    class SettingComposer

    {

        public function compose(View $view)

        {

            $setting = Setting::first();

            $get_name = 'name_'.\App::getLocale();

            $get_des = 'description_'.\App::getLocale();
            $get_mt = 'mt_'.\App::getLocale();
            $get_td = 'td_'.\App::getLocale();

            $get_des2 = 'description2_'.\App::getLocale();

            $get_des3 = 'description3_'.\App::getLocale();

            $get_des4 = 'description4_'.\App::getLocale();

            $get_title = 'title_'.\App::getLocale();

            $get_address = 'address_'.\App::getLocale();



            $data = [

                'setting' => $setting,

                'get_name' => $get_name,

                'get_des' => $get_des,

                'get_des2' => $get_des2,

                'get_des3' => $get_des3,
                'get_mt' => $get_mt,
                'get_td' => $get_td,

                'get_des4' => $get_des4,

                'get_title' => $get_title,

                'get_address' => $get_address,

            ];



            $view->with($data);

        }

    }

