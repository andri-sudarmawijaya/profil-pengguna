<?php 

namespace Bantenprov\ProfilPengguna;

use Illuminate\Support\Facades\Route;

/**
 * The ProfilPengguna class.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPengguna
{
    public function welcome()
    {
        return 'Welcome to Bantenprov\ProfilPengguna package';
    }

    public function route()
    {    
    	
    	$middleware = config('profil-pengguna.middleware');
    	$prefix     = config('profil-pengguna.prefix');

    	Route::group(['prefix' => $prefix,'middleware' => $middleware], function(){
    		Route::get('/profil','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@index')->name('profil.index');

    		Route::get('/profil/edit-account','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@editAccount')->name('profil.edit-account');

    		Route::get('/profil/change-password','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@changePassword')->name('profil.change-password');    		

    		Route::post('/profil/edit-account/update','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@updateAccount')->name('profil.update');

    		Route::post('/profil/change-password/update-password','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@updatePassword')->name('profil.update-password');

    	});    	
    }    
}
