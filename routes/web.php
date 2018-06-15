<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    //SACAR
    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    
    //PESQUISA
    Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');

    // Históricos
    Route::get('historic', 'BalanceController@historic')->name('admin.historic');

    //DESPOSITAR
    Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    Route::get('deposit', 'BalanceController@deposit')->name('balance.deposito');
    
    //TRANSFERIR
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    Route::post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    
    //INDEX
    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('/', 'AdminController@index')->name('admin.home');
});
//Profile
Route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');
Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');

Route::get('/', 'Site\\SiteController@index')->name('home');


Auth::routes();


