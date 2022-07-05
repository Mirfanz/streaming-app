<?php 

namespace App\Controllers;

class Latest extends BaseController
{
  public function index ()
  {
    $data = [
      'title' => 'Latest Update',
      'page' => 'latest',
    ];
    return view('pages/latest',$data);
  }
}