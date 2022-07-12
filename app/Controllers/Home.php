<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Selamat Datang | FanDev',
			'page' => 'home',
		];
		return view('pages/home',$data);
	}
}
