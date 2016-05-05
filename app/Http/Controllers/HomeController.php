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
use Response;
use App\file;

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
        
            'password'=> $pass,
            'dateRegister' => $data['dateRegister']
           
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
       
		$id=Auth::user()->id;
       	$data=array();
		$json = file_get_contents('http://localhost:5000/getdatafileuser/'.$id);
		$obj= json_decode($json,true);
		//var_dump($obj);
		$i = 0;
		foreach ($obj['data'] as $key => $value) {
			# code...
			$data[$i]['judul']=$value['judul'];
			$data[$i]['password']=$value['password'];
			$data[$i]['timestamp']=$value['timestamp'];
			$data[$i]['id']=$value['id'];


		
			$i+=1;
		}

        	return view('dashboard')->with('nama', $data);
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

        public function update(){
        	$data=Input::all();
        	$password=bcrypt($data['password']);
        	 $id=Auth::user()->id;
        	 DB::table('user')->where('id', $id) ->update(['nama_user' => $data['nama']]);
              DB::table('user')->where('id', $id)->update(['password' => $data['password']]);
              DB::table('user')->where('id', $id) ->update(['username' => $data['username']]);
               DB::table('user')->where('id', $id) ->update(['paidstatus' => $data['status']]);
               DB::table('user')->where('id', $id)  ->update(['email' => $data['email']]);

                return redirect('profile');

            

        }

        public function edit($id){
        	$data=array();

        	$data['konten']=file::where('id','=',$id)->get();
        	return view('edit_dokumen',$data);
        }
        public function updatekonten(){
        	$data=Input::all();
        	$id=$data['id'];
        	$timestamp=date("Y-m-d h:i:s");
        	 DB::table('file')->where('id', $id) ->update(['konten' => $data['editor']]);
             DB::table('file')->where('id', $id)->update(['timestamp' => $timestamp]);
             return redirect('editdokumen/'.$id);
        }
    
    public function save(){
    	$data=Input::all();
    	$nama=$data['username'];
    	$phpWord = new \PhpOffice\PhpWord\PhpWord();
    	$section = $phpWord->addSection();
    	$html=$data['editor'];
    	//$phpWord = \PhpOffice\PhpWord\IOFactory::load($html, 'HTML');

		\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
    	//$section->addText($data['creator']);
    	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save($nama.'.docx');
		//dd($data['editor'] );
		$judul=$nama.'.docx';

		 return Response::download(($judul));

    }
}