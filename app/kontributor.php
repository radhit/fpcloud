<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontributor extends Model
{
	public $table = "kontributor";
    protected $fillable = array(
	'id_user',
	'id_file'
	
	

	

    	);
}
