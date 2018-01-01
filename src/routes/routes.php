<?php

Route::group(['prefix' => 'profil-pengguna'], function() {
    Route::get('demo', 'Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@demo');
});
