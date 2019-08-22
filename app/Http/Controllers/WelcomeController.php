<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page if the user is not authorized.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return ($request->user()) ? redirect('weather') : view('welcome');
    }
}
