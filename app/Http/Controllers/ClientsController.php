<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Clients;

class ClientsController extends Controller
{
    public function index()
    {
      if(Auth::user()->role == "admin"){
        $clients = Clients::All();
        return response()->json($clients, 200);
      }elseif(Auth::user()->role == "vendeur"){
        $clients = Clients::where('vendeur', Auth::user()->id);
        return response()->json($clients, 200);
      }else{
        return response("Unauthorized Access", 401);
      }

    }

    // Get Client by ID
    public function getClient($id)
    {
      $client = Clients::find($id);
      return response()->json($client, 200);
    }

    // Add Client
    public function addClient(Request $request)
    {
      $client = Clients::create($request->all());
      return $client;
    }

    // Drop Client
    public function dropClient(Request $request)
    {
      $clients = Clients::find($request->all());

    }
}
