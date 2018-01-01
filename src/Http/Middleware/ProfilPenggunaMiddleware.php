<?php namespace Bantenprov\ProfilPengguna\Http\Middleware;

use Closure;

/**
 * The ProfilPenggunaMiddleware class.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPenggunaMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
