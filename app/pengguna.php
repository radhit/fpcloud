<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
	public $table = "user";
    protected $fillable = array(
	'username',
	'email',
	'nama_user',
	'password',
	'email',
	'paidstatus'

	

    	);
}
