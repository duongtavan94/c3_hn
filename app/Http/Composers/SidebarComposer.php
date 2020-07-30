<?php

    namespace App\Http\Composers;



    use Illuminate\Contracts\View\View;

    use App\Models\Cate_product;

    use App\Models\Support;

    use App\Models\Post;

    use App\Models\Cate_post;

    use App\Models\Slide;



    class SidebarComposer

    {

        public function compose(View $view)

        {

            $cate_nangluc = Cate_product::where('status', 1)->get();



            $data = [

                'cate_nangluc' => $cate_nangluc,

            ];



            $view->with($data);



        }

    }

