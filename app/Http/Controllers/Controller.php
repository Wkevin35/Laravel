<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $USER = 'user';   		//使用者
    public $USER_ID = 'id'; 	//使用者id
	public $NICK_NAME = 'nickname';	//使用者暱稱
    public $TYPE = 'type';			//使用者型態
    public $DOMAIN = 'http://laravel.local/';
}
