<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use up;
class SettingsController extends Controller
{
	public function index (){
		return view('settings');
	}
        public function update(Request $request, $id)
	
    {
        $data = $this->validate(request(),
			[
				'name'     => 'required|min:6',
				'email'    => 'required|email|unique:users,email,'.$id,
				'image'		=>v_image(),
			]);
        if (request()->hasFile('image')) {
    		if(!empty(setting()->image)){
    			$data['image'] = Up::upload([
                    //'new_name' =>'',
                    'file'     =>'image',
                    'path'      =>'images',
                    'upload_type'=>'single',
                    'delete_file'=>setting()->image,
                ]);
    		}
    	}
        User::where('id',$id)->update($data);
        return redirect('setting');
    }
    public function update_password($id){
    	$user = User::find($id);

    	if (Hash::check(request('old_password'), Auth::user()->password)) {
    		$data = $this->validate(request(),[
    			'old_password' => 'required|string|min:6',
    			'password' => 'required|string|min:6|same:passwordConfirmation',
    			'passwordConfirmation' => 'required|string|min:6',
    			]);
    		$data['password'] = bcrypt(request('password'));
    		$user->update($data);
    		return redirect('setting');
    	}else{
    		session()->flash('failed','incorrect password has been entered');
    		return redirect('setting');
    	}

    	
    }

    public function status($id){
    	$user = User::find($id);

    	if (request()->has('status') && !empty(request('status'))) {
    			$data = $this->validate(request(),[
    				'status'=> 'in:disable'
    			]);
    			$user->update($data);
    			return redirect('setting'); 

    	}elseif (request()->has('delete')) {
        	$user->delete();
        	return redirect('home');
    	}
    	else{
    		return redirect('setting');
    	}
    }

}
