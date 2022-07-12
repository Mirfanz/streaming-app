<?php 

namespace App\Controllers;

class Popular extends BaseController
{
  public function index ()
  {
    $data = [
      'page'=>'popular',
      'title'=>'Popular Movies | FanDev',
    ];
    return view('pages/popular',$data);
  }
}