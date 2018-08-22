 <?php

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


Auth::routes();

Route::group(['middleware' => 'auth', 'as' => 'chat.'], function () {
    Route::get('/', 'ChatroomController@getFriends')->name('getFriends');
    Route::get('chat/{friend_id}', 'ChatroomController@getMyFriend')->name('getMyFriend');
});

Route::group(['namespace' => 'Api', 'middleware' => 'auth', 'as' => 'api.'], function (){
    Route::get('fetch-message/{friend_id}', 'ApiController@fetchMessages')->name('fetchMessages');
    Route::get('selected-friend/{friend_id}', 'ApiController@getSelectedFriend')->name('selectedFriend');
    Route::get('user-detail', 'ApiController@getAuthUser')->name('authUser');
    Route::post('store-message', 'ApiController@storeMessage')->name('storeMessage');
});