<?php
use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::group(['middleware' => 'Start'],function(){
//
//});


//,'middleware' => 'Start'
Route::group(['namespace' => 'Client'],function (){
    Route::get('/','IndexController@index')->name('home');
    Route::get('detail/{slug}','IndexController@detail')->name('detail');
    Route::get('group/{slug}','IndexController@group')->name('group');
    Route::group(['prefix'=>'article'],function(){
        Route::get('/{slug}','ArticelController@get_detail')->name('get_detail_articel');
        Route::post('action_comment','ArticelController@action_comment')->name('action_comment');
    });

//    Route::group(['prefix' => 'group'],function(){
//        Route::get('/{slug}','GroupController@get_articel_by_group')->name('get_articel_by_group');
//    });
    Route::get('/open_video/{id}','VideosController@open_video')->name('open_video');

    Route::post('ad_view', 'IndexController@ad_view');
    Route::post('article_view', 'IndexController@article_view');

    Route::get('about', 'ArticelController@getAbout');



});


Route::get('/vnhn_start','ClientController@vnhn_start')->name('vnhn_start');

Route::get('/set_lang/{lang}','ClientController@set_lang')->name('set_lang');

Route::get('login', 'Admin\LoginController@getLogin')->middleware('CheckLogout');
// Route::post('login', 'Admin\LoginController@postLogin');

Route::post('login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);



Route::get('logout', 'Admin\LoginController@getLogout');
Route::get('lockscreen', 'Admin\LoginController@getLockScreen');
Route::post('lockscreen', 'Admin\LoginController@postLockScreen');


Route::group(['namespace' => 'Admin'], function (){
	Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function (){
		Route::get('/', 'HomeController@getHome')->name('admin');
		// Route::get('/{slug}', 'HomeController@getHome');

        /*
         * articel
         */

        Route::group(['prefix' => 'articel'], function(){
            Route::get('/','ArticelController@get_list')->name('admin_articel');
            Route::get('/form_articel/{id}','ArticelController@form_articel')->name('form_articel');
            Route::post('/action_articel','ArticelController@action_articel')->name('action_articel');
            Route::get('/delete_articel/{id}','ArticelController@delete_articel')->name('delete_articel');
            Route::get('/history_articel/{id}','ArticelController@history_articel')->name('history_articel');
            Route::get('/view_log/{id}','ArticelController@view_log')->name('view_log');
            Route::get('/view_log_now/{id}','ArticelController@view_log_now')->name('view_log_now');
            Route::get('/sort_hot_articel','ArticelController@sort_hot_articel')->name('sort_hot_articel');
            Route::post('/sort_hot_articel_post','ArticelController@sort_hot_articel_post')->name('sort_hot_articel_post');
            Route::post('/update_order_articel','ArticelController@update_order_articel')->name('update_order_articel');
            Route::get('/delete_articel_hot/{groupid}/{id}','ArticelController@delete_articel_hot')->name('delete_articel_hot');
            Route::get('/update_status/{id}','ArticelController@update_status')->name('update_status');
            Route::get('/approved', 'ArticelController@approved');
            Route::get('/approved_cgroup', 'ArticelController@approved_cgroup');
            //for bien tap vien
            Route::get('/post_article', 'ArticelController@post_article')->name('post_article');
            Route::get('/returned_article', 'ArticelController@returned_article')->name('returned_article');
            Route::get('/wait_article', 'ArticelController@wait_article')->name('wait_article');
            Route::get('/draft_article', 'ArticelController@draft_article')->name('draft_article');
            

            Route::post('on', 'ArticelController@getOn');
            Route::post('off', 'ArticelController@getOff');

            Route::post('return', 'ArticelController@getReturn');

            Route::post('status1', 'ArticelController@get1');
            Route::post('status2', 'ArticelController@get2');
            Route::post('status3', 'ArticelController@get3');
            Route::post('status4', 'ArticelController@get4');
            Route::post('send_article', 'ArticelController@send_article');
            
            Route::post('getComment', 'ArticelController@getComment');

            Route::post('get_relate', 'ArticelController@get_relate');

            Route::post('set_time', 'ArticelController@set_time');

            Route::post('group_child_from', 'ArticelController@get_group_child_form');

            Route::get('/fix_bug','ArticelController@fix_bug');


        });


        Route::group(['prefix' => 'banner'], function() {
            Route::get('/','BannerController@getList');
            Route::post('add','BannerController@postAdd');
            Route::post('edit/{id}','BannerController@postEdit');
            Route::get('delete/{id}','BannerController@getDelete');
        });

        Route::group(['prefix' => 'profile'], function(){
            Route::get('/', 'ProfileController@getDetail');
            Route::post('/', 'ProfileController@postDetail');

            Route::get('change_pass', 'ProfileController@getChangePass');
            Route::post('change_pass', 'ProfileController@postChangePass');

        });
        Route::group(['prefix' => 'video'], function(){
            Route::get('/','VideoController@get_list')->name('admin_video');
            Route::get('/form_video/{id}','VideoController@form_video')->name('form_video');
            Route::post('/action_video','VideoController@action_video')->name('action_video');
            Route::get('/delete_video/{id}','VideoController@delete_video')->name('delete_video');
            Route::get('/history_video/{id}','VideoController@history_video')->name('history_video');
            Route::get('/update_status/{id}','VideoController@update_status')->name('update_status');

            Route::post('status', 'VideoController@action_status');
        });

        Route::group(['prefix' => 'website_info'],function(){
            Route::get('/','WebsiteInfoController@index')->name('website_info');
            Route::post('/add_info','WebsiteInfoController@add_info')->name('add_info');
            Route::post('/update_info','WebsiteInfoController@update_info')->name('update_info');
            Route::post('/update_info_raw','WebsiteInfoController@update_info_raw')->name('update_info_raw');
            Route::get('/delete_info/{id}','WebsiteInfoController@delete_info')->name('delete_info');
        });

        Route::group(['middleware' => 'CheckSite'], function(){
            Route::group(['prefix' => 'account'], function(){
                Route::get('/', 'AccountController@getList');

                Route::get('add','AccountController@getAdd');
                Route::post('add','AccountController@postAdd');

                Route::get('edit/{id}','AccountController@getEdit');
                Route::post('edit/{id}','AccountController@postEdit');

                Route::get('delete/{id}','AccountController@getDelete');

            });

            Route::group(['prefix' => 'group'], function(){
                Route::post('on', 'GroupController@getOn');
                Route::post('off', 'GroupController@getOff');
                Route::get('delete_home_index/{id}', 'GroupController@delete_home_index')->name('delete_home_index');

            });
            Route::get('/group','GroupController@getList')->name('admin_group');
            Route::get('/group/form_group/{id}',['as' => 'form_group','uses' => 'GroupController@form_group']);
            Route::post('/action_group',['as' => 'action_group','uses' => 'GroupController@action_group']);
            Route::post('/merge_group',['as' => 'merge_group','uses' => 'GroupController@merge_group']);
            Route::get('/delete_group/{id}/{group_id}',['as' => 'delete_group','uses' => 'GroupController@delete_group']);
            Route::get('/group/form_sort_group/{id}',['as' => 'form_sort_group','uses' => 'GroupController@form_sort_group']);
            Route::get('/group/form_sort_group_category/{id}',['as' => 'form_sort_group_category','uses' => 'GroupController@form_sort_group_category']);
            Route::post('/group/update_order',['as' => 'update_order','uses' => 'GroupController@update_order']);
        });

        Route::group(['prefix' => 'image'], function() {
            Route::get('/','ImageController@getList');
            Route::post('add','ImageController@postAdd');
//            Route::get('add','ImageController@getAdd');
            Route::get('delete/{id}','ImageController@getDelete');
        });

    });
});

Route::post('/upload_image',['as' => 'upload_image','uses' => 'ClientController@upload_image']);
Route::get('/desktop_mobile',['as' => 'desktop_mobile','uses' => 'ClientController@desktop_mobile']);

Route::get('{slug}', 'Client\IndexController@home');
Route::get('local/resources/assets/{slug}', 'Client\IndexController@home');

