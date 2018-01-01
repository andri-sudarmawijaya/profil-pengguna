<?php namespace Bantenprov\ProfilPengguna\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The ProfilPengguna facade.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPengguna extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'profil-pengguna';
    }
}
