<?php namespace Bantenprov\ProfilPengguna\Console\Commands;

use Illuminate\Console\Command;

/**
 * The ProfilPenggunaCommand class.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPenggunaCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profil-pengguna:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install command for Bantenprov\ProfilPengguna package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('vendor:publish',[
            '--tag' => 'profil-pengguna-views'
        ]);

        $this->call('vendor:publish',[
            '--tag' => 'profil-pengguna-config'
        ]);

        $this->call('vendor:publish',[
            '--tag' => 'profil-pengguna-trait'
        ]);

        $this->info('Installation done');
    }
}
