<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tamael\Admin\UserManager;
use Tamael\Admin\RoleManager;

class UserController 
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private static $post;
    private static $UM;
    private static $RM;

    public function __construct()
    {
        $UM = new UserManager;
        $RM = new RoleManager;
        SELF::$UM = $UM;
        SELF::$RM = $RM;
    }
    
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
            return SELF::$UM->add(SELF::$post);
        }
        else
        {
            $data = array();
            $data['role'] = SELF::$RM->get();
            return viewAdmin('user/add', $data);
        }
    }

}
