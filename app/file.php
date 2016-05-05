<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
	public $table = "file";
    protected $fillable = array(
	'id',
	'author',
	'konten',
	'password',
	'judul',
	'timestamp'

	

    	);
}
