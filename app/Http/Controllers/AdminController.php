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

    // public function __destruct()
    // {
    //     SELF::destroyURL();
    // }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module = null, $submodule = null)
    {
        // SELF::createURL($module, $submodule);
        if($module == 'user')
        {
            $UserController = new UserController;
            return $UserController->getFunction($submodule);
        }
        else
        {
            return viewAdmin('home');
        }

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

    // public function createURL($module = null, $submodule = null)
    // {

    //     $childURL = config('app.url-admin').(($module!=null)?'/'.$module.(($submodule!=null)?'/'.$submodule:''):'');
    //     Session::put('childURL', $childURL);
        
    //     $parentsURL = explode('/',$childURL);
    //     unset($parentsURL[count($parentsURL) - 1]);
    //     $parentsURL = implode('/',$parentsURL);

    //     Session::put('parentsURL', $parentsURL);

    //     return true;
        
    // }

    // public function destroyURL()
    // {
    //     Session::forget('childURL');
    //     Session::forget('parentsURL');
    //     return true;
    // }

}
