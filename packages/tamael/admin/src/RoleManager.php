<?php

namespace Tamael\Admin;
 
use Validator;
use App\Role as ModelRole;
use App\Http\Controllers\Controller;
 
class RoleManager extends Controller
{
    
    private static $ModelRole;

    public function __construct()
    {
        SELF::$ModelRole = new ModelRole;
    }

    public function get()
    {
        return SELF::$ModelRole->get();
    }
    
}