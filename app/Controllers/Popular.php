<?php 

namespace App\Controllers;

class Popular extends BaseController
{
  public function index ()
  {
    $data = [
      'page'=>'popular',
      'title'=>'Popular Movies',
    ];
    return view('pages/popular',$data);
  }
}