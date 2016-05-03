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
use App\pengguna;

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

		//dd($data);


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

	public function register(){

		$data=Input::all();
        $pass=bcrypt( $data['password']);
        pengguna::insertGetId(array(
            'nama_user'=> $data['nama'],
            'email'=>$data['email'],
            'username'=>$data['username'],
        
            'password'=> $pass
           
            ));
            return redirect('login');
	}

 public function logout()
    {
        Auth::logout();
        return redirect('/');
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
             
               
                    //$id=Auth::user()->id;
                
                   return redirect()->intended('dashboard');
                //return 'asdfjhdsafasdf';
              
                   
                //return 'asdfjhdsafasdf';
            }
            else{

                Session::flash('message','Login anda gagal, silahkan cek kembali username dan password');
               return redirect('/');
                return 'login gagal';

            } 
            // return redirect('loginadmin');
        }

        public function dashboard(){
       
	// for ($i=0; $i < sizeof($obj); $i++) { 
		// 	# code...
		// 	echo $obj[0]['alamat'];
		// }
		// 11
		// $data = $obj->getData();
		// // echo $data->alamat;
		// var_dump($data);
        	return view('dashboard');
        }

        public function profil(){
        $id=Auth::user()->id;
       	$data=array();
		$json = file_get_contents('http://localhost:5000/getdatauser/'.$id);
		$obj= json_decode($json,true);
		//var_dump($obj);
		$i = 0;
		foreach ($obj['data'] as $key => $value) {
			# code...
			$data[$i]['nama']=$value['nama_user'];
			$data[$i]['email']=$value['email'];
			$data[$i]['username']=$value['username'];

		
			$i+=1;
		}

		


		return view('profil')->with('nama', $data);
  //       	return view('profil');
        }
    

}