<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Artisan;
use Storage;
use View;

class ParametresController extends Controller
{
    public function index()
    {
      $sliders = \App\Sliders::All();
      return View::make('dashboard.parametres', compact('sliders'));
    }

    public function backup()
    {
      try{
        Artisan::call("backup:run", ["--only-db" => true]);
        $backup = Artisan::output();
        Log::info(Auth::user()->nom." a creer un nouveau backup.");
        return 1;
      }catch(Exception $e){
        return 0;
      }
    }

    public function download()
    {
      $disk = Storage::disk('local');
      $file = $disk->files(config('backup.backup.name'))[0];
      $fs = Storage::disk('local')->getDriver();
      $stream = $fs->readStream($file);
      return \Response::stream(function() use ($stream){
        fpassthru($stream);
      }, 200, [
        "Content-Type" => $fs->getMimetype($file),
        "Content-Length" => $fs->getSize($file),
      ]);
    }
}
