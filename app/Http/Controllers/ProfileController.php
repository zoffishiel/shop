<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\View;
use App\User;


class ProfileController extends Controller
{

    public function index()
    {
        return view('dashboard.profile');
    }

}
