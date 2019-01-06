<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;

class MessagesController extends Controller
{
    public function index()
    {
      $messages = Messages::All();
      return response()->json($messages, 200);
    }

    public function addMessage(Request $request)
    {
      $message = Messages::create($request->all());
      return $message ? 1 : 0;
    }
}
