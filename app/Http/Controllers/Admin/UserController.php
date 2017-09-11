<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UserController 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private static $post;

    public function getFunction($submodule = null, $postRequest = null)
    {

        if($postRequest != null)
            SELF::$post = $postRequest;
        else
            SELF::$post = false;
        
        switch($submodule)
        {
            case 'add': 
                return SELF::add(); break;
            case 'role':
                return SELF::role(); break;
            default :
                return SELF::index(); break;
        }
    }

    private function index()
    {
        return viewAdmin('user/home');
    }

    private function add()
    {
        if(SELF::$post)
        {
            
        }
        else
        {
            return viewAdmin('user/add');
        }
    }

}
