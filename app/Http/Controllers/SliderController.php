<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;
use Validator;

class SliderController extends Controller
{
    public function index()
    {
      $sliders = Sliders::All();
      return response()->json($sliders, 200);
    }

    public function getSlider($id)
    {
      $slider = Sliders::find($id);
      return response()->json($slider, 200);
    }

    public function addSlider(Request $request)
    {
      $rules = [
        "image" => ["required", "mimetypes:image/png,image/jpeg"],
        "titre" => ["required", "string", "max:255"],
        "description" => ["required", "string"],
        "lien" => ["string", "max:255"],
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        return 0;
      }else{
        $path = $request->file("image")->store("img", ["disk" => "images"]);
        $slider = new Sliders();
        $slider->titre = $request->input('titre');
        $slider->description = $request->input('description');
        $slider->lien = $request->input('lien');
        $slider->image = $path;
        $slider->save();
        // Sliders::create($request->all());
        return redirect("/dashboard/parametres");
      }
    }

    public function updateSlider(Request $request)
    {
      $slider = Sliders::find($request->input("id"));
      $res = $slider->update($request->except("id"));
      return $res ? 1 : 0;
    }

    public function dropSlider($id)
    {
      $slider = Sliders::find($id);
      if(!is_null($slider)){
        $res = $slider->delete();
      }else{
        return 0;
      }
      return $res ? 1 : 0;
    }
}
