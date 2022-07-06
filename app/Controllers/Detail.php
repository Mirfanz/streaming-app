<?php 

namespace App\Controllers;

class Detail extends BaseController
{
  public function movie ($id)
  {
    $data = [
      'id'=>$id,
    ];
    return view('pages/detail-movie', $data);
  }
}