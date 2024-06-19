<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'as' => 'panel.'
], function () {

    Route::group(['prefix' => 'panel'], function () {

        Route::get('/', function () {
            return redirect(route('panel.showLogin'));
        });

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
        Route::post('login', 'Auth\LoginController@login')->name('login');

        /*
         * Reset Password Routes
         */

        Route::group(['prefix' => 'password/', 'namespace' => 'Auth', 'as' => 'password.'], function () {
            Route::post('email', ['as' => 'email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
            Route::get('reset/{token}', ['as' => 'reset', 'uses' => 'ResetPasswordController@showResetForm']);
            Route::post('reset', ['as' => 'update', 'uses' => 'ResetPasswordController@reset']);
        });


        Route::group(['middleware' => 'auth:admin'], function () {

            Route::get('index', 'HomeController@index')->name('index');

            Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {

                Route::group(['middleware' => 'permission:show_admins'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'AdminController@datatable']);
                });

                Route::group(['prefix' => 'create', 'middleware' => 'permission:add_admins'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'AdminController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'AdminController@store']);
                });
                Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_admins'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'AdminController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'AdminController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);
                });
            });
            Route::group(['as' => 'admin.'], function () {
                Route::get('/profile', ['as' => 'profile', 'uses' => 'AdminController@showProfile']);
                Route::post('/profile/update', ['as' => 'update.profile', 'uses' => 'AdminController@updateProfile']);
            });

            Route::group(['prefix' => 'permission', 'as' => 'permission.', 'middleware' => 'permission:manage_roles'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'RoleController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'RoleController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'RoleController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'RoleController@store']);
                });

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'RoleController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'RoleController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'RoleController@destroy']);
                });

                Route::post('deleteAll', ['as' => 'deleteAll', 'uses' => 'RoleController@deleteAll']);

            });


            // Faq Category Routes //
            Route::group(['prefix' => 'faq-categories', 'as' => 'faq_categories.','middleware' => 'permission:manage_faq'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'FaqCategoryController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'FaqCategoryController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'FaqCategoryController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'FaqCategoryController@store']);
                });
                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'FaqCategoryController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'FaqCategoryController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'FaqCategoryController@destroy']);
                });
            });
            Route::group(['prefix' => 'faq/', 'as' => 'faq.','middleware' => 'permission:manage_faq'], function () {
                Route::get('index', ['as' => 'index', 'uses' => 'FaqController@index']);
                Route::get('datatable', ['as' => 'datatable', 'uses' => 'FaqController@datatable']);

                Route::group(['prefix' => '/create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'FaqController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'FaqController@store']);
                });

                Route::group(['prefix' => '{id}/'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'FaqController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'FaqController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'FaqController@destroy']);
                });
                Route::post('operation', ['as' => 'operation', 'uses' => 'FaqController@operation']);

            });



            Route::group(['prefix' => 'pages', 'as' => 'pages.','middleware' => 'permission:manage_pages'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'PageController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'PageController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'PageController@store']);
                });
                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'PageController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'PageController@update']);
                    Route::delete('/', ['as' => 'destry', 'uses' => 'PageController@destroy']);
                });

            });

            Route::group(['prefix' => 'settings' , 'as' => 'settings.','middleware' => 'permission:manage_settings'], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'SettingsController@index']);
                Route::put('/', ['as' => 'store', 'uses' => 'SettingsController@store']);
            });



            Route::group(['prefix' => 'help-center', 'as' => 'help-center.', 'namespace' => 'HelpCenter'], function () {

                Route::group(['prefix' => 'inbox', 'as' => 'inbox.','middleware' => 'permission:manage_inbox'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'InboxController@index']);
                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'InboxController@datatable']);

                    Route::group(['prefix' => '{id}'], function () {
                        Route::get('/show', ['as' => 'show', 'uses' => 'InboxController@show']);
                        Route::delete('/', ['as' => 'destroy', 'uses' => 'InboxController@destroy']);
                    });

                    Route::post('/add-replay', ['as' => 'add-replay', 'uses' => 'InboxController@replay']);
                });
//                Route::group(['prefix' => 'complaints', 'as' => 'complaints.'], function () {
//                    Route::get('/', ['as' => 'index', 'uses' => 'ComplaintController@index']);
//                    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'ComplaintController@datatable']);
//
//                    Route::group(['prefix' => '{id}'], function () {
//                        Route::get('/show', ['as' => 'show', 'uses' => 'ComplaintController@show']);
//                        Route::delete('/', ['as' => 'destroy', 'uses' => 'ComplaintController@destroy']);
//                    });
//
//                    Route::post('/add-replay', ['as' => 'add-replay', 'uses' => 'ComplaintController@replay']);
//                    Route::post('{id}/operation/{status}', ['as' => 'operation', 'uses' => 'ComplaintController@operation']);
//                });
//
//
            });

            Route::group(['prefix' => 'blogs', 'as' => 'blogs.', 'middleware' => 'permission:manage_blogs'], function () {

                Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'BlogController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'BlogController@store']);
                });

                Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
                    Route::get('/{id}', ['as' => 'index', 'uses' => 'BlogController@edit']);
                    Route::put('/{id}', ['as' => 'update', 'uses' => 'BlogController@update']);
                });

                Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'BlogController@index']);
                    Route::get('/data', ['as' => 'data', 'uses' => 'BlogController@getDataTable']);
                });

                Route::delete('/{id}', ['as' => 'delete', 'uses' => 'BlogController@delete']);
                Route::post('operation', ['as' => 'operation', 'uses' => 'BlogController@operation']);
            });



//            ---------------------------------------------------------------------------------------------

            Route::group(['prefix' => 'tenants', 'as' => 'tenants.'], function () {

                Route::get('/', ['as' => 'index', 'uses' => 'TenantController@index']);
                Route::get('/datatable', ['as' => 'datatable', 'uses' => 'TenantController@datatable']);

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'TenantController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'TenantController@store']);
                });

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'TenantController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'TenantController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'TenantController@destroy']);
                });
                Route::post('operation', ['as' => 'operation', 'uses' => 'TenantController@operation']);
            });

            Route::group(['prefix' => 'notifications/', 'as' => 'notifications.',], function () {
                Route::group(['prefix' => '/send'], function () {
                    Route::get('/', ['as' => 'send', 'uses' => 'NotificationController@send']);
                    Route::post('/', ['as' => 'send.store', 'uses' => 'NotificationController@store']);
                });
            });

//            -----------------------------------------------------------------------------------------------------------------



            Route::get('logout', function () {
                \Illuminate\Support\Facades\Auth::guard('admin')->logout();
                return back();
            })->name('logout');


        });


    });

});


