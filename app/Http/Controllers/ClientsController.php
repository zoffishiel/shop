<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class ClientsController extends Controller
{
    public function index()
    {
      $clients = Clients::All();
      return response()->json($clients, 200);
    }

    // Add Client
    public function addClient(Request $request)
    {
      $client = Clients::create($request->all());
      return $client;
    }

    // Drop Client
    public function dropClient($id)
    {
      $client = Clients::find($id);
      if(is_null($client)){
        return 0;
      }else{
        $client->delete();
        return 1;
      }
    }
}
