<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceLivraison;

class ServiceLivraisonController extends Controller
{
    function index()
    {
      $services = ServiceLivraison::All();
      return response()->json($services, 200);
    }

    function addService(Request $request)
    {
      $service = ServiceLivraison::create($request->all());
      return $service ? 1 : 0;
    }

    // function dropService(Request $request)
    // {
    //   $service = ServiceLivraison::find($id)->delete();
    //   return $service ? 1 : 0;
    // }
}
