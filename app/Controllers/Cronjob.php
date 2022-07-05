<?php 
namespace App\Controllers;

class Cronjob extends BaseController
{
  public function harian()
  {
    $data = require_once('js/top250.json');
    $data = json_decode($data);
    dd($data);
  }
}