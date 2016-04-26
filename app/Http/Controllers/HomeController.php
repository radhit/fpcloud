<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Session;
use Validator;
use DB;
use Illuminate\Http\JsonResponse;
use View;

class HomeController extends controller{

	public function get(){
		$data=array();
		$json = file_get_contents('http://localhost:5000/getUser');
		$obj= json_decode($json,true);
		//var_dump($obj);
		$i = 0;
		foreach ($obj['data'] as $key => $value) {
			# code...
			$data[$i]['nama']=$value['nama_user'];
			$data[$i]['alamat']=$value['alamat'];
		
			$i+=1;
		}

		// dd($data);


		return view('xxx')->with('nama', $data);
	// for ($i=0; $i < sizeof($obj); $i++) { 
		// 	# code...
		// 	echo $obj[0]['alamat'];
		// }
		// 11
		// $data = $obj->getData();
		// // echo $data->alamat;
		// var_dump($data);
	}


	public function daftar(){
		return view('register');
	}

	public function login(){
		return view('login');
	}
	  public function loginform(Request $request)
    {
            
            // $credentials = Input::only('username','password');
            $new = $request->only('username','password');
            // $this->data['username'] = Input::get('username');
            
            // dd($credentials);

            if (Auth::attempt($new,true))
            {
                    //if(Auth::role()==1)
                        // return 'asdf';
             
               
                    $id=Auth::user()->id;
                
                  //  return redirect()->intended('dashboard');
                //return 'asdfjhdsafasdf';
                return 'login oke';
                   
                //return 'asdfjhdsafasdf';
            }
            else{

                Session::flash('message','Login anda gagal, silahkan cek kembali username dan password');
               // return redirect('/');
                return 'login gagal';

            } 
            // return redirect('loginadmin');
        }
    

}