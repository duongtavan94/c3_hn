<?php



Route::group(['middleware' => ['web','locale']], function() {
    Auth::routes();

    Route::get('language/{locale}','Frontend\HomeController@changeLanguage');

    Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.getLogin');

    Route::post('admin/login', 'Admin\LoginController@postLogin')->name('admin.postLogin');

    Route::get('/', 'Frontend\HomeController@index')->name('index');

    Route::get('/thong-tin-giao-duc', 'Frontend\HomeController@thongtingiaoduc')->name('thongtingiaoduc');
    Route::get('/tuyen-sinh', 'Frontend\HomeController@chinhanh')->name('chinhanh');

    Route::get('/ly-do-chon', 'Frontend\HomeController@lydochon')->name('lydochon');

    Route::get('/thong-tin-giao-duc/{slug}', 'Frontend\HomeController@showgiaoduc')->name('showgiaoduc');

    Route::get('/tin-tuc-su-kien/', 'Frontend\HomeController@tintuc')->name('tintuc');

    Route::get('/tin-tuc-su-kien/{slug}', 'Frontend\HomeController@showtintuc')->name('showtintuc');

    Route::get('gioi-thieu', 'Frontend\IntroController@index')->name('intro');

    Route::get('lien-he', 'Frontend\ContactController@index')->name('contact');

    Route::post('lien-he', 'Frontend\ContactController@postContact')->name('post_contact');

    Route::get('search', 'Frontend\PostController@postSearch')->name('postSearch');
    Route::get('video', 'Frontend\HomeController@video')->name('video');
    Route::get('giaovien', 'Frontend\HomeController@giaovien')->name('giaovien');

    Route::group(['prefix' => 'post'], function() {

        Route::get('/', 'Frontend\ProductController@allProduct')->name('allProduct');

        Route::get('/{slug}', 'Frontend\ProductController@productByCate')->name('productByCate');

        Route::get('/detail/{id}', 'Frontend\ProductController@detailProduct')->name('detail_product');

    });

    Route::group(['prefix' => 'chuong-trinh-hoc'], function() {

        Route::get('/', 'Frontend\PostController@listPost')->name('list_post');

        Route::get('/chi-tiet', 'Frontend\PostController@detail')->name('detail');

    });

    Route::group(['prefix' => 'cart'], function() {

        Route::get('/', 'Frontend\CartController@index')->name('cart.index');

        Route::get('add-cart/{id}', 'Frontend\CartController@addCart')->name('add-cart');

        Route::get('destroy-cart/{id}', 'Frontend\CartController@destroyCart')->name('destroy_cart');

        Route::get('order', 'Frontend\CartController@order')->name('order');

        Route::post('order', 'Frontend\CartController@postOrder')->name('postOrder');

        Route::get('update', 'Frontend\CartController@updateCart')->name('updateCart');

    });
    Route::group(['prefix' => 'thu-vien-anh'], function() {
        Route::get('/', 'Frontend\AlbumController@allAlbum')->name('allAlbum');
        Route::get('/{slug}', 'Frontend\AlbumController@detailAlbum')->name('detailAlbum');
    });
    Route::group(['prefix' => 'tai-lieu'], function() {
        Route::get('/', 'Frontend\TailieuController@index')->name('allTailieu');
        Route::get('/{slug}', 'Frontend\TailieuController@show')->name('tailieuByCate');
    });

});
Route::group(['middleware' => ['web','userLogin']], function() {
    Route::group(['prefix' => 'tai-lieu'], function() {
        Route::get('/chi-tiet/{id}', 'Frontend\TailieuController@detail')->name('detail_tailieu');
    });
});



Route::group(['middleware' => ['adminLogin', 'web']], function() {

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('ckfinder-customer', 'Admin\CkfinderController@ckfinderView')->name('ckfinder-customer');

    Route::any('connector', 'Admin\CkfinderController@connector')->name('kakaka');

    Route::group(['prefix' => 'admin'], function() {

        Route::get('/', function () {return view('admin/index');})->name('admin.index');

        Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

        Route::group(['prefix' => 'cart'], function() {

            Route::get('bill', 'Admin\OrderController@order')->name('admin.order');

            Route::get('bill/{id}', 'Admin\OrderController@bill')->name('admin.bill');

            Route::get('order/destroy/{id}', 'Admin\OrderController@destroyOrder')->name('admin.destroyOrder');

            Route::post('postStatus/{id}', 'Admin\OrderController@postStatus')->name('admin.postStatus');

            Route::post('/checkbox', 'Admin\OrderController@checkbox')->name('admin.cart.checkbox');

        });

        Route::group(['prefix' => 'cate_product'], function() {

            Route::get('/', 'Admin\CateProductController@index')->name('admin.cate_product.home');

            Route::get('/create', 'Admin\CateProductController@create')->name('admin.cate_product.create');

            Route::post('/create', 'Admin\CateProductController@postCreate')->name('admin.cate_product.createPost');

            Route::get('/update/{id}', 'Admin\CateProductController@update')->name('admin.cate_product.update');

            Route::post('/update/{id}', 'Admin\CateProductController@postUpdate')->name('admin.cate_product.postUpdate');

            Route::get('/destroy/{id}', 'Admin\CateProductController@destroy')->name('admin.cate_product.destroy');

            Route::post('/status', 'Admin\CateProductController@status')->name('admin.cate_product.status');

        });

        Route::group(['prefix' => 'product'], function() {

            Route::get('/', 'Admin\ProductController@index')->name('admin.product.index');

            Route::get('/create', 'Admin\ProductController@create')->name('admin.product.create');

            Route::post('/create', 'Admin\ProductController@postCreate')->name('admin.product.createPost');

            Route::get('/update/{slug}', 'Admin\ProductController@update')->name('admin.product.update');

            Route::post('/update/{slug}', 'Admin\ProductController@postUpdate')->name('admin.product.postUpdate');

            Route::get('/destroy/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');

            Route::get('/search', 'Admin\ProductController@search')->name('admin.product.search');

            Route::post('/checkbox', 'Admin\ProductController@checkbox')->name('checkbox');

            Route::post('/status', 'Admin\ProductController@status')->name('admin.product.status');

            Route::post('/is_home', 'Admin\ProductController@is_home')->name('admin.product.is_home');

            Route::get('delImage','Admin\ProductController@delImage')->name('admin.product.dellimg');

        });

        Route::group(['prefix' => 'cate_post'], function() {

            Route::get('/', 'Admin\CatePostController@index')->name('admin.cate_post.home');

            Route::get('/create', 'Admin\CatePostController@create')->name('admin.cate_post.create');

            Route::post('/create', 'Admin\CatePostController@postCreate')->name('admin.cate_post.createPost');

            Route::get('/update/{slug}', 'Admin\CatePostController@update')->name('admin.cate_post.update');

            Route::post('/update/{slug}', 'Admin\CatePostController@postUpdate')->name('admin.cate_post.postUpdate');

            Route::get('/destroy/{id}', 'Admin\CatePostController@destroy')->name('admin.cate_post.destroy');

            Route::post('/status', 'Admin\CatePostController@status')->name('admin.cate_post.status');

        });

        Route::group(['prefix' => 'post'], function() {

            Route::get('/', 'Admin\PostController@index')->name('admin.post.index');

            Route::get('/create', 'Admin\PostController@create')->name('admin.post.create');

            Route::post('/create', 'Admin\PostController@postCreate')->name('admin.post.createPost');

            Route::get('/update/{slug}', 'Admin\PostController@update')->name('admin.post.update');

            Route::post('/update/{slug}', 'Admin\PostController@postUpdate')->name('admin.post.postUpdate');

            Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('admin.post.destroy');

            Route::get('/search', 'Admin\PostController@search')->name('admin.post.search');

            Route::post('/checkbox', 'Admin\PostController@checkbox')->name('post.checkbox');

            Route::post('/status', 'Admin\PostController@status')->name('admin.post.status');

            Route::post('/is_home', 'Admin\PostController@is_home')->name('admin.post.is_home');

        });

        Route::group(['prefix' => 'intro'], function() {

            Route::get('/', 'Admin\IntroController@index')->name('admin.intro.index');

            // Route::get('data', 'Admin\IntroController@loadData')->name('admin.intro.loadData');

            // Route::post('store', 'Admin\IntroController@store')->name('admin.intro.store');

            // Route::post('delete', 'Admin\IntroController@delete')->name('admin.intro.delete');

            // Route::get('getUpdate', 'Admin\IntroController@getUpdate')->name('admin.intro.getUpdate');

            // Route::post('updates', 'Admin\IntroController@updates')->name('admin.intro.updates');

            Route::get('/create', 'Admin\IntroController@create')->name('admin.intro.create');

            Route::post('/create', 'Admin\IntroController@postCreate')->name('admin.intro.createPost');

            Route::get('/update/{slug}', 'Admin\IntroController@update')->name('admin.intro.update');

            Route::post('/update/{slug}', 'Admin\IntroController@postUpdate')->name('admin.intro.postUpdate');

            Route::get('/destroy/{slug}', 'Admin\IntroController@destroy')->name('admin.intro.destroy');

            Route::post('/status', 'Admin\IntroController@status')->name('admin.intro.status');
            Route::post('/cc', 'Admin\IntroController@cc')->name('admin.intro.cc');

        });

        Route::group(['prefix' => 'banner'], function() {

            Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');

            Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');

            Route::post('/create', 'Admin\BannerController@postCreate')->name('admin.banner.createPost');

            Route::get('/update/{slug}', 'Admin\BannerController@update')->name('admin.banner.update');

            Route::post('/update/{slug}', 'Admin\BannerController@postUpdate')->name('admin.banner.postUpdate');

            Route::get('/destroy/{slug}', 'Admin\BannerController@destroy')->name('admin.banner.destroy');

            Route::post('/status', 'Admin\BannerController@status')->name('admin.banner.status');

        });

        Route::group(['prefix' => 'contact'], function() {

            Route::get('/', 'Admin\ContactController@index')->name('admin.contact.index');
            Route::get('/{id}', 'Admin\ContactController@show')->name('admin.contact.show');

            Route::get('/destroy/{id}', 'Admin\ContactController@destroy')->name('admin.contact.destroy');
            Route::post('postStatus/{id}', 'Admin\ContactController@postStatus')->name('admin.contact.postStatus');
            Route::get('export/excel', 'Admin\ContactController@exportExcel')->name('admin.contact.exportexcel');

        });

        Route::group(['prefix' => 'slide'], function() {

            Route::get('/', 'Admin\SlideController@index')->name('admin.slide.index');

            Route::get('/create', 'Admin\SlideController@create')->name('admin.slide.create');

            Route::post('/create', 'Admin\SlideController@postCreate')->name('admin.slide.createPost');

            Route::get('/update/{id}', 'Admin\SlideController@update')->name('admin.slide.update');

            Route::post('/update/{id}', 'Admin\SlideController@postUpdate')->name('admin.slide.postUpdate');

            Route::get('/destroy/{id}', 'Admin\SlideController@destroy')->name('admin.slide.destroy');

            Route::post('/status', 'Admin\SlideController@status')->name('admin.slide.status');

        });

        Route::group(['prefix' => 'administrator'], function() {

            Route::get('/', 'Admin\LoginController@index')->name('admin.administrator.home');

            Route::get('/anyData', 'Admin\LoginController@anyData')->name('anyData');

            Route::get('/create', 'Admin\LoginController@create')->name('admin.administrator.create');

            Route::post('/create', 'Admin\LoginController@postCreate')->name('admin.administrator.createPost');

            Route::get('/update/{id}', 'Admin\LoginController@update')->name('admin.administrator.update');

            Route::post('/update/{id}', 'Admin\LoginController@postUpdate')->name('admin.administrator.postUpdate');

            Route::get('/destroy/{id}', 'Admin\LoginController@destroy')->name('admin.administrator.destroy');

        });
        Route::group(['prefix' => 'album'], function() {
            Route::get('/', 'Admin\AlbumController@index')->name('admin.album.index');
            Route::get('/create', 'Admin\AlbumController@create')->name('admin.album.create');
            Route::post('/create', 'Admin\AlbumController@postCreate')->name('admin.album.createPost');
            Route::get('/update/{slug}', 'Admin\AlbumController@update')->name('admin.album.update');
            Route::post('/update/{slug}', 'Admin\AlbumController@postUpdate')->name('admin.album.postUpdate');
            Route::get('/destroy/{id}', 'Admin\AlbumController@destroy')->name('admin.album.destroy');
            Route::get('/search', 'Admin\AlbumController@search')->name('admin.album.search');
            Route::post('/checkbox', 'Admin\AlbumController@checkbox')->name('checkbox');
            Route::post('/status', 'Admin\AlbumController@status')->name('admin.album.status');
            Route::get('delImage','Admin\AlbumController@delImage')->name('admin.album.dellimg');
        });
        Route::group(['prefix' => 'vin'], function() {
            Route::get('/', 'Admin\VinController@index')->name('admin.vin.index');
            Route::get('/create', 'Admin\VinController@create')->name('admin.vin.create');
            Route::post('/create', 'Admin\VinController@postCreate')->name('admin.vin.createPost');
            Route::get('/update/{id}', 'Admin\VinController@update')->name('admin.vin.update');
            Route::post('/update/{id}', 'Admin\VinController@postUpdate')->name('admin.vin.postUpdate');
            Route::get('/destroy/{id}', 'Admin\VinController@destroy')->name('admin.vin.destroy');
            Route::post('/status', 'Admin\VinController@status')->name('admin.vin.status');
        });
        Route::group(['prefix' => 'invest'], function() {
            Route::get('/', 'Admin\InvestController@index')->name('admin.invest.index');
            Route::get('/create', 'Admin\InvestController@create')->name('admin.invest.create');
            Route::post('/create', 'Admin\InvestController@postCreate')->name('admin.invest.createPost');
            Route::get('/update/{id}', 'Admin\InvestController@update')->name('admin.invest.update');
            Route::post('/update/{id}', 'Admin\InvestController@postUpdate')->name('admin.invest.postUpdate');
            Route::get('/destroy/{id}', 'Admin\InvestController@destroy')->name('admin.invest.destroy');
            Route::post('/status', 'Admin\InvestController@status')->name('admin.invest.status');
        });
        Route::group(['prefix' => 'cate_investor'], function() {
            Route::get('/', 'Admin\CateInvestorController@index')->name('admin.cate_investor.home');
            Route::get('/create', 'Admin\CateInvestorController@create')->name('admin.cate_investor.create');
            Route::post('/create', 'Admin\CateInvestorController@postCreate')->name('admin.cate_investor.createPost');
            Route::get('/update/{slug}', 'Admin\CateInvestorController@update')->name('admin.cate_investor.update');
            Route::post('/update/{slug}', 'Admin\CateInvestorController@postUpdate')->name('admin.cate_investor.postUpdate');
            Route::get('/destroy/{id}', 'Admin\CateInvestorController@destroy')->name('admin.cate_investor.destroy');
            Route::post('/status', 'Admin\CateInvestorController@status')->name('admin.cate_investor.status');
        });
        Route::group(['prefix' => 'investor'], function() {
            Route::get('/', 'Admin\InvestorController@index')->name('admin.investor.index');
            Route::get('/create', 'Admin\InvestorController@create')->name('admin.investor.create');
            Route::post('/create', 'Admin\InvestorController@postCreate')->name('admin.investor.createPost');
            Route::get('/update/{slug}', 'Admin\InvestorController@update')->name('admin.investor.update');
            Route::post('/update/{slug}', 'Admin\InvestorController@postUpdate')->name('admin.investor.postUpdate');
            Route::get('/destroy/{id}', 'Admin\InvestorController@destroy')->name('admin.investor.destroy');
            Route::get('/search', 'Admin\InvestorController@search')->name('admin.investor.search');
            Route::post('/checkbox', 'Admin\InvestorController@checkbox')->name('investor.checkbox');
            Route::post('/status', 'Admin\InvestorController@status')->name('admin.investor.status');
            Route::post('/is_home', 'Admin\InvestorController@is_home')->name('admin.investor.is_home');
        });

        Route::get('setting', 'Admin\SettingController@index')->name('admin.setting');

        Route::post('setting/update', 'Admin\SettingController@update')->name('admin.setting.update');

        Route::get('gioi-thieu', 'Admin\SettingController@index2')->name('admin.gioi-thieu');

        Route::post('gioi-thieu/update', 'Admin\SettingController@update2')->name('admin.gioi-thieu.update');
        Route::get('chi-nhanh', 'Admin\SettingController@index3')->name('admin.chi-nhanh');

        Route::post('chi-nhanh/update', 'Admin\SettingController@update3')->name('admin.chi-nhanh.update');

    });
    

});



