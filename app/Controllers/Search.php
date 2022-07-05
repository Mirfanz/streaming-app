<?php 
namespace App\Controllers;

class SEarch extends BaseController
{
  public function index()
  {
    $data = [
      'page'=> 'search',
      'title'=>'Search Movie',
      'query'=>$this->request->getGet('query'),
    ];
    return view('pages/search',$data);
  }
}