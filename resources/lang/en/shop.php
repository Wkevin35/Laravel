<?php

return [
	'home' =>'Home',
	'transaction' => [
		'name'=>'Transaction',
		'list'=>'Transaction List',
		'buy' => 'Buy',
		'field'=>[
			'buy-count'=>'Buy Number',
		],
	],

	'merchandise' =>[
		'name'				=>'Merchandise',
		'create'			=>'Create Merchandise',
		'manage'			=>'Manage Merchandise',
		'edit' 				=>'Edit Merchandise',
		'list'				=>'Merchandise List',
		'page'				=>'Merchandise Page',
		'purchase-success'	=>'Purchase Success',
		'update'			=>'Update',
		'fields'			=>[
			'id'				=>'Id',
			'status-name'		=>'Status',
			'status'			=>[
				'create'=>'Create',
				'sell'	=>'Sell',
			],
			'name'				=>'Name',
			'name-en'			=>'English Name',
			'introduction'		=>'Introduction',
			'introduction-en'	=>'English Introduction',
			'photo'				=>'Photo',
			'price'				=>'Price',
			'remain-count'		=>'Remain Count',
		],
	],

	'auth'=>[
		'sign-out' 			=>'Sign Out',
		'sign-in'  			=>'Sign In',
		'sign-up'  			=>'Sign Up',
		'facebook-sign-in'	=>'facebook Sign In',		 	
	],

	'user'=>[
		'fields'=>[
			'nickname'			=>'Nickname',
			'email'				=>'Email',
			'password'			=>'Password',
			'confirm-password'	=>'Confirm Password',
			'type-name'			=>'Type',
			'type'=>[
				'general'	=>'General',
				'admin'		=>'Admin',
			],
		],
	],
	'welcome' =>'Welcome to my merchandise test page',
	'check' =>'Check',
];