<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class ParametresController extends Controller
{
    public function backup(){
      Artisan::call("backup:run", ["--only-db" => true]);
      $backup = Artisan::output();
      return response($backup, 200);
    }
}
