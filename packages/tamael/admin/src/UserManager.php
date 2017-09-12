<?php

namespace Tamael\Admin;
 
use Validator;
use App\User as ModelUser;
use App\Http\Controllers\Controller;
 
class UserManager extends Controller
{
    
    private static $ModelUser;

    public function __construct()
    {
        SELF::$ModelUser = new ModelUser;
    }

    public function add($post = null)
    {
        if($post != null)
        {
            $rules = array(
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            );
            $validator = Validator::make($post->all(), $rules);
            if($validator->fails())
            {
                return $validator->errors();
            }
            else
            {
                SELF::$ModelUser->create([
                    'email' => $post->get('email')
                ]);
                
                SELF::$ModelUser->password = $post->get('email');
                SELF::$ModelUser->role = $post->get('role');
                SELF::$ModelUser->save();
                return $validator->success('User created !');
            }
        }
        else
        {
               
        }
    }
 
}