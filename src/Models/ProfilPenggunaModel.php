<?php namespace Bantenprov\ProfilPengguna\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The ProfilPenggunaModel class.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPenggunaModel extends Model
{
    /**
    * Table name.
    *
    * @var string
    */
    protected $table = 'profil_pengguna';

    /**
    * The attributes that are mass assignable.
    *
    * @var mixed
    */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
