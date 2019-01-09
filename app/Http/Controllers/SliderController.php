<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
      $sliders = Slider::All();
      return response()->json($sliders, 200);
    }

    public function addSlider()
    {

    }

    public function updateSlider($id)
    {

    }

    public function dropSlider($id)
    {
      $slider = Slider::find($id)->delete();
      return $slider ? 1 : 0;
    }
}
