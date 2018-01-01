<?php namespace Bantenprov\ProfilPengguna\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\ProfilPengguna\Facades\ProfilPengguna;
use Bantenprov\ProfilPengguna\Models\ProfilPenggunaModel;
use Validator;

/**
 * The ProfilPenggunaController class.
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPenggunaController extends Controller
{        

    use \App\Traits\ProfilPenggunaTrait;

    public function demo()
    {
        return ProfilPengguna::welcome();
    }

    public function index()
    {
    	$title = "Profil";
    	return view('profil-pengguna.index',compact('title'));
    }    

    public function editAccount()
    {
    	$user = \Auth::user();
    	$title = "Edit Account";
    	return view('profil-pengguna.edit-account',compact('user','title'));
    }

    public function updateAccount(Request $request)
    {

    	if($request->nik == \Auth::user()->nik){
    		$validator = Validator::make($request->all(),[
	    		'name' => 'required',
	    		'nik'  => 'required'
	    	]);
    	}else{
    		$validator = Validator::make($request->all(),[
	    		'name' => 'required',
	    		'nik'  => 'required|unique:users,nik'
	    	]);
    	}
    	

    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	try {
    		\App\User::findOrFail(\Auth::user()->id)->update([
    			'name' => $request->name,
    			'nik'  => $request->nik
    		]);
    		return redirect()->back()->with('message','Profil berhasil di update');
    	} catch (\Exception $e) {
    		return redirect()->back()->withErrors('Critical Error');
    	}
    }

    public function changePassword()
    {
    	$title = "Change password";
    	return view('profil-pengguna.change-password',compact('title'));
    }

    public function updatePassword(Request $request)
    {
    	$user = \App\User::findOrFail(\Auth::user()->id);

        $check_old_passwd = \Hash::check($request->old_password, $user->password);

        if($check_old_passwd)
        {
            $validator = Validator::make($request->all(),[
                'password' => 'required|same:confirm_password'
            ]);
            
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator);
            }
            \App\User::findOrFail(\Auth::user()->id)->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect()->back()->with('message','Success update new password');
        }else{
            return redirect()->back()->withErrors('wrong old password');
        }
    }
}
