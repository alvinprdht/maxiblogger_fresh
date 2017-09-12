<?php

namespace Tamael\Admin;
 
use App\Http\Controllers\Controller;
 
class AdminManagerController extends Controller
{
 
    public function index()
    {
        return 'true';
    }

    public function user($actions = null, $post = false)
    {
        if($post)
        {
            if($action == 'add')
            {
                
            }
        }
    }
 
}