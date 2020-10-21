<?php

namespace App\Core\Models;

use App\Libs\Model\Model;

class UserModel extends Model
{
	
	function __construct ()
	{
		parent::__construct('users');
	}

}