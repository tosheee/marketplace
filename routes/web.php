<?php
//buttons -> refactor
View::composer('*', function($view) {$view->with('siteViewInformation',      App\Admin\InfoCompany::orderBy('created_at', 'desc')->first()); });
View::composer('*', function($view) {$view->with('categoriesButtonsName',    App\Admin\Category::all()); });
View::composer('*', function($view) {$view->with('subCategoriesButtonsName', App\Admin\SubCategory::all()); });
View::composer('*', function($view) {$view->with('subCategories',            App\Admin\SubCategory::all());});
View::composer('*', function($view) {$view->with('allSliderData',            App\Admin\Slider::all());});
View::composer('*', function($view) {$view->with('pagesButtonsRender',       App\Admin\Page::where('active_page', true)->get());});
//////////////////////////////////////////////\
Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

//auth

Auth::routes();


//facebook socilite
Route::group(['namespace' => 'Auth', 'prefix' => 'login'], function() {
    Route::get('/{provider}', 'LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'LoginController@handleProviderCallback');
});
//////////////////////////////

//store
Route::get('/', 'StoreController@index');

Route::group(['prefix' => 'store'], function() {
    Route::get('/page',               ['uses' => 'StoreController@getShowPages', 'as' => 'store.showPage']);
    Route::get('',                    ['uses' => 'StoreController@index',        'as' => 'store.index']);
    Route::get('/search',             ['uses' => 'SearchController@search',      'as' => 'store.search']);
    Route::get('/{id}',               ['uses' => 'StoreController@show',         'as' => 'store.show']);
    Route::post('/add-to-cart',       ['uses' => 'StoreController@getAddToCart']);
    Route::post('/send-user-message', ['uses' => 'StoreController@postUserMessage']);
    Route::post('/like_product/{id}', ['uses' => 'StoreController@getLikeProduct']);
    Route::post('/remove/{id}',       ['uses' => 'StoreController@getRemoveItem', 'as' => 'store.remove']);
    Route::get('/checkout',           ['uses' => 'StoreController@getCheckout',   'as' => 'store.checkout']);
    Route::post('/checkout',          ['uses' => 'StoreController@postCheckout']);
    Route::get('/shopping-cart',      ['uses' => 'StoreController@getCart',       'as' => 'store.shoppingCart']);
});
/////////////////////////////////

//Accounts
Route::group(['prefix' => 'account'], function() {
    Route::get('/{id}',                  ['uses' => 'AccountsController@index',            'as' => 'accounts.index',         'middleware' => 'roles', 'roles' => ['User'] ]);
    Route::get('/view_user_orders/{id}', ['uses' => 'AccountsController@viewUserOrders',   'as' => 'store.index',            'middleware' => 'roles', 'roles' => ['User'] ]);
    Route::get('/create_seller',         ['uses' => 'AccountsController@createSeller',     'as' => 'accounts.create_seller', 'middleware' => 'roles', 'roles' => ['User', 'Seller'] ]);
    Route::post('/store_seller',         ['uses' => 'AccountsController@storeSeller',      'as' => 'accounts.store_seller',  'middleware' => 'roles', 'roles' => ['User'] ]);
});
/////////////////////////////////////////

//sellers
Route::group(['prefix' => 'sellers'], function() {
    Route::get('/{user_id}',                       ['uses' => 'SellersController@index',            'as' => 'sellers.index',            'middleware' => 'roles', 'roles' => ['Seller'] ]);
    Route::get('/{user_id}/create_product',        ['uses' => 'SellersController@createProduct',                                        'middleware' => 'roles', 'roles' => ['Seller'] ]);
    Route::post('/store_product',                  ['uses' => 'SellersController@storeProduct',     'as' => 'sellers.store_product',    'middleware' => 'roles', 'roles' => ['Seller'] ]);
    Route::get('/{user_id}/products/{id}',         ['uses' => 'SellersController@insertedProducts', 'as' => 'sellers.insertedProducts', 'middleware' => 'roles', 'roles' => ['Seller'] ]);
    Route::get('/{user_id}/create_seller',         ['uses' => 'SellersController@createSeller',     'as' => 'sellers.create_seller',    'middleware' => 'roles', 'roles' => ['Seller'] ]);
    Route::post('/{user_id}/store_seller',         ['uses' => 'SellersController@storeSeller',      'as' => 'sellers.store_seller',     'middleware' => 'roles', 'roles' => ['Seller'] ]);


});



/////////////////////////////////////////////////////

// Admin
Route::group(['prefix' => 'admin'], function() {
    Route::get    ('/dashboard',            ['uses' => 'AdminController@index']);
    Route::get    ('/not_completed_orders', ['uses' => 'AdminController@not_completed_orders']);
    Route::get    ('/dashboard/{id}',       ['uses' => 'AdminController@viewOffer']);
    Route::get    ('/completed_order/{id}', ['uses' => 'AdminController@completedOrder']);
    Route::delete ('/dashboard/{id}',       ['uses' => 'AdminController@destroy']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/products/search', ['uses' => 'ProductsController@search_category', 'as' => 'search_category' ]);
    Route::get ('',                ['uses' => 'LoginController@showLoginForm',      'as' => 'admin.login']);
    Route::post('',                ['uses' => 'LoginController@login']);
    Route::get ('/answer/{id}',    ['uses' => 'UserMessagesController@markAnswer']);

    Route::resource('/categories',     'CategoriesController');
    Route::resource('/sub_categories', 'SubCategoriesController');
    Route::resource('/products',       'ProductsController');
    Route::resource('/users',          'UserController');
    Route::resource('/info_company',   'InfoCompanyController');
    Route::resource('/admins',         'AdminController');
    Route::resource('/pages',          'PagesController');
    Route::resource('/slider',         'SliderController');
    Route::resource('/user_messages',  'UserMessagesController');
    Route::resource('/cities',         'CitiesController');
    Route::resource('/countries',      'CountriesController');
    Route::resource('/sellers',        'SellersController');
});

Route::post('admin/products/create/{id?}', function($id = null) {
    $subCategoryAttributes = App\Admin\SubCategory::where('category_id', $id)->get();
    $subCategoryOptions = array();
    foreach($subCategoryAttributes as $key => $subCatAttribute)
    {
        $subCategoryOptions[$key] = [$subCatAttribute->id, $subCatAttribute->name, $subCatAttribute->identifier];
    }
    return $subCategoryOptions;
});

/*
  Rouse::get('/author', [
    'uses' => 'AppController@getGenerateArticle',
    'as'   => 'author.article',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Author']
]);
 */

/*
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('news', ['uses' => 'NewsController@index']);
    Route::get('users', ['uses' => 'UserController@index']);
});
*/