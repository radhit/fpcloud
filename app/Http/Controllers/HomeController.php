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
use App\kontributor;


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

	public function registerpaid(){

		$data=Input::all();

		   $rules = array(
            'file' => 'image|max:3000',
        );
    
       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $validation = Validator::make($data, $rules);
 
        // CHECK GIVEN DATA IS VALID OR NOT
     //    if ($validation->fails()) {
     //     Session::flash('message','Login anda gagal, silahkan cek kembali username dan password');
     //     return Redirect::to('peserta/'.$id);
     // }

       
        
        
           $file = array_get($data,'pembayaran');
           // SET UPLOAD PATH
            $destinationPath = 'buktipembayaran';
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            $nama= $file->getClientOriginalName();

            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = $nama; 
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $upload_success = $file->move($destinationPath, $fileName);
            $filepath = $destinationPath . '/' . $nama;

        $pass=bcrypt( $data['password']);
        pengguna::insertGetId(array(
            'nama_user'=> $data['nama'],
            'email'=>$data['email'],
            'username'=>$data['username'],
        	'buktipembayaran'=>$filepath,
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
                    
                $id=Auth::user()->id;

				$timestamp= pengguna::select('dateregispaid')->where('id',$id)->first();

				
				$dateregispaid=  $timestamp['dateregispaid'];
				if($dateregispaid!=NULL){

					$datenow=date("Y-m-d");
					$date1=date_create($dateregispaid);
					$date2=date_create($datenow);
					$time=date_diff($date1,$date2);
					$expired=$time->format("%a");
						

					if ($expired=="30") {
							 DB::table('user')->where('id', $id) ->update(['buktipembayaran' => '']);
							 DB::table('user')->where('id', $id) ->update(['paidstatus' => '']);
							    return redirect()->intended('dashboard');
							
					}
					else{
						   return redirect()->intended('dashboard');
					}
	                
						
				}
				else{
					   return redirect()->intended('dashboard');

				}
				
                
                //return 'asdfjhdsafasdf';
              
                   
                //return 'asdfjhdsafasdf';
            }
            else{

                Session::flash('message','Login anda gagal, silahkan cek kembali username dan password');
               return redirect('/');
                

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


        public function dashboard2(){
       
		$id=Auth::user()->id;
       	$data=array();
       	$iduser= pengguna::select('dateregispaid')->where('id',$id)->first();

		$json = file_get_contents('http://localhost:5000/getdatasharedfileuser/'.$id);
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

        	return view('dashboard2')->with('nama', $data);
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
	         $phpWord = new \PhpOffice\PhpWord\PhpWord();
	    	$section = $phpWord->addSection();
	    	$html=$data['editor'];
	    	//$phpWord = \PhpOffice\PhpWord\IOFactory::load($html, 'HTML');
			$nama=$data['username'];
			\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
	    	//$section->addText($data['creator']);
	    	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('dokumen/'.$nama.'.docx');
			//dd($data['editor'] );
			
             return redirect('editdokumen/'.$id);
        }
    
    public function save(){
    	$data=Input::all();
    	$nama=$data['username'];
    	$judul=$nama.'.docx';
    	 $file = public_path()."/dokumen/".$judul;
   		 $headers = array('Content-Type' => ' docx');

		 $respon=Response::download($file,$judul,$headers);
		   ob_end_clean();
		   return $respon;

    }

    public function tambahkontributor(){
    	$data=input::all();
    	$id=$data['idfile'];
    	$nama=$data['kontributor'];
    	$iduser= pengguna::select('id')->where('username',$nama)->first();
    	
	
			 $iduser2=$iduser['id'];	

     
	if($iduser!=NULL){
    		
			 kontributor::insertGetId(array(
            'id_user'=> $iduser2,
            'id_file'=>$id
           
            ));
			session::flash('berhasil','sdsdsqf');
			return redirect('dashboard');
		}
		else if($iduser==NULL){

			session::flash('gagal','sdsdsd');
			return redirect('dashboard');
		}

		}	
		
		public function regispaid(){
			return view('regispaid');
		}
		
	public function updatebuktipembayaran(){
		$data=input::all();
		$id=$data['id'];
		$timestamp=date("Y-m-d");
		 DB::table('user')->where('id', $id) ->update(['paidstatus' => 1]);
		  DB::table('user')->where('id', $id) ->update(['dateregispaid' => $timestamp]);

		 	session::flash('gagal','sasa');
		 return redirect('inihalamanadmin');
	}
 public function adminpage(){
 		$data=array();
		$json = file_get_contents('http://localhost:5000/getUser');
		$obj= json_decode($json,true);
		//var_dump($obj);
		$i = 0;
		foreach ($obj['data'] as $key => $value) {
			# code...
			$data[$i]['id']=$value['id'];
			$data[$i]['nama']=$value['nama_user'];
			$data[$i]['email']=$value['email'];
			$data[$i]['username']=$value['username'];
			$data[$i]['paidstatus']=$value['paidstatus'];
			$data[$i]['buktipembayaran']=$value['buktipembayaran'];

		
			$i+=1;
		}


 	return view('admin/admin')->with('nama', $data);
 }   
      public function deleteuser($id){
      
      	DB::table('user')->where('id','=',$id)->delete();
      	session::flash('berhasil','sasa');
      	return redirect('inihalamanadmin');

      }

}