<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracking;

class TrackingController extends Controller
{
    public function track(Request $request)
    {
      $track = Tracking::find($request->input('tracking_number'));
      if(is_null($track)){
        return 0;
      }else{
        return response()->json($track, 200);
      }
    }

    public function updateTrack(Request $request)
    {
      $track = Tracking::create($request->all());
      return $track ? 1 : 0;
    }
}
