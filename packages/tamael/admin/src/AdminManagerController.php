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
    
    public static function to($pagename = '', $state = '')
    {
        $stringURL = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $segment = explode('/', $stringURL);
        if($state == 'parents' || $pagename == 'parents')
        {
            unset($segment[count($segment) - 1]);
            $stringURL = implode('/', $segment);
            return $stringURL.(($pagename != '')?'/'.$pagename:'');
        }
        elseif($state == 'self' || $pagename == 'self')
        {
            return $stringURL.(($pagename != '')?'/'.$pagename:'');
        }
        else
            return URL::to(config('app.url-admin').($pagename != '')?'/'.$pagename:'');
    }
 
}