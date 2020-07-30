<?php
    namespace App\Http\Composers;

    use Illuminate\Contracts\View\View;
    use Cart;
    use App\Models\Banner;

    class HeaderComposer
    {
        public function compose(View $view)
        {
            $count = Cart::count();
            $total = Cart::total();
            
            $datas = [
                'count' => $count,
                'total' => $total,
            ];

            $view->with($datas);
        }
    }
