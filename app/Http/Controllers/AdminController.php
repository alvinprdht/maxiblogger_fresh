<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController as UserController;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module = null, $submodule = null)
    {
        $childURL = config('app.url-admin').(($module!=null)?'/'.$module.(($submodule!=null)?'/'.$submodule:''):'');
        Session::put('childURL', $childURL);
        
        if($module == 'user')
        {
            $UserController = new UserController;
            return $UserController->getFunction($submodule);
        }
        else
        {
            return viewAdmin('home');
        }

        Session::forget('childURL');
    }

    public function postAction($module = null, $submodule = null, Request $r)
    {
        if($module == 'user')
        {
            $UserController = new UserController;
            return $UserController->getFunction($submodule, $r);
        }
        else
        {
            return view('404');
        }
    }

}
