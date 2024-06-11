<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integration;

class Dashboard extends Controller
{

   public function index()
   {
      $integrations = Integration::all();
      return view('dashboard-vertical.index',['integrations' => $integrations]);

   }


}

