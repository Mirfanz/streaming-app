<?php 

namespace App\Controllers;

class Detail extends BaseController
{
  public function movie ($id)
  {
    $data = [
      'id'=>$id,
      'title'=> 'Movie Detail | Fandev',
      'page' => 'e'
    ];
    return view('pages/detail-movie', $data);
  }
}