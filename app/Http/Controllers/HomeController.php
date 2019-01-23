<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function index()
    {
      $sliders = \App\Sliders::All();
      return View::make("welcome", compact("sliders"));
    }
}
