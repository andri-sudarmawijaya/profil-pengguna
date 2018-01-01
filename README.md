# Profil Pengguna
Profil Pengguna Aplikasi Pemerintah Provinsi Banten

### install
install kanekes :
`composer create-project bantenprov/kanekes project_name "v0.3.0"`
install package :
`composer require bantenprov/profil-pengguna:dev-master`

### require
`kanekes v0.3.0`

### edit config

edit `config/app.php` :

```php
'providers' => [
    Illuminate\Redis\RedisServiceProvider::class,
    Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
    Illuminate\Session\SessionServiceProvider::class,
    Illuminate\Translation\TranslationServiceProvider::class,
    Illuminate\Validation\ValidationServiceProvider::class,
    Illuminate\View\ViewServiceProvider::class,
    //....
    Collective\Html\HtmlServiceProvider::class,
    Bantenprov\ProfilPengguna\ProfilPenggunaServiceProvider::class,
```

```php
'aliases' => [
    'Schema' => Illuminate\Support\Facades\Schema::class,
    'Session' => Illuminate\Support\Facades\Session::class,
    'Storage' => Illuminate\Support\Facades\Storage::class,
    'URL' => Illuminate\Support\Facades\URL::class,
    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    //...
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
    'Profil' => Bantenprov\ProfilPengguna\Facades\ProfilPengguna::class,
```

### Artisan command

```bash
php artisan profil-pengguna:install
```
jika berhasil maka pada terminal atau command prompt akan terlihat seperti :

```bash
Copied Directory [/workbench/bantenprov/profil-pengguna/src/resources/views] To [/resources/views]
Publishing complete.
Copied File [/workbench/bantenprov/profil-pengguna/src/config/config.php] To [/config/profil-pengguna.php]
Publishing complete.
Copied File [/workbench/bantenprov/profil-pengguna/src/stub/traits/trait.stub] To [/app/Traits/ProfilPenggunaTrait.php]
Publishing complete.
Installation done
```

#### tambahkan `Profil::route()` pada `routes/web.php`

```php
Profil::route();
```

jalankan artisan command : `php artisan route:list --name=profil` untuk melihat route name dan url

### config
untuk mengganti prefix atau middleware dapat di ganti melalui file `config/profil-pengguna.php`

```php
    'middleware' => 'auth',
    'prefix'     => 'dashboard'
```

### Trait

untuk menambahkan method yang belum ada pada class `ProfilPenggunaController` bisa ditambahkan pada `app/Traits/ProfilPenggunaTrait.php`.

### Contoh

misal untuk menambahkan method `changePicture` pada class `ProfilPenggunaController` :

```php
	namespace App\Traits;	

	trait ProfilPenggunaTrait
	{
		public function changePicture(\Request $request)
		{
			return 'change picture';
		}
	}
```

jadi pada `routes/web.php` bisa ditambahkan seperti berikut :

```php
Profil::route();
//...

Route::get('/profil/change-picture','\Bantenprov\ProfilPengguna\Http\Controllers\ProfilPenggunaController@changePicture')->name('profil.change-picture');
```
