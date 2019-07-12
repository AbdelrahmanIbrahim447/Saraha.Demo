<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Messages;
use App\User;
class messagesController extends Controller
{
    public function send_message($name, $id){
    	//$id = Input::get('id');
    	
    	return view('messages',compact('id','name'));
    }
    public function recive_message($id){
    	$data = $this->validate(request(),[
    		
            'message' => 'required|string',
            'sender_id' => 'required|numeric',
    		'reciver_id' => 'required|numeric',
    	]);

    	 Messages::create($data);
    	
    	return redirect('home');
    }
    public function delete($id){
        $messages = Messages::find($id);
        $messages->delete();
        return back();
    }
}
