<?php

namespace Ontheroadjp\LaravelUser\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Input;
use URL;
use Hash;
use Session;
use App\Http\Controllers\Controller;
use NutsPages\LaravelUer\Models\UserActivity as Activity;

class PasswordController extends Controller
{
    public function changePassword(Request $req)
    {
        $params = Input::all();

        if($req->ajax())
        {
            if(Auth::check())
            {
                $user = Auth::user();
                $rules = [
                    'current_password' => 'required|min:6',
                    'new_password' => 'required|confirmed|min:6',
                ];
                
                $validator = Validator::make(Input::all(), $rules);
                if($validator->fails())
                {
                    //return \Response::json([
                    //    'message' => $validator->errors()->first();
                    //],'422');
                    return \Response::make($validator->messages()->toJson(),'422');
                } 
                else 
                {
                    if(!Hash::check(Input::get('current_password'), $user->password)) 
                    {
                        //return redirect(URL::previous())->withErrors(_('Your old password does not match.'));
                        //Session::flash('alert_danger','Your old password does not match.'); 
                        return \Response::json([
                            'message' => _('Your current password does not match.') 
                        ],'403');
                    } 
                    else 
                    {
                        $user->password = Hash::make(Input::get('new_password'));
                        $user->save();
                        //return redirect(URL::previous())->withMessage(_('Password has been changed.'));
                        //Session::flash('alert_success','Password has been changed.');
                        return \Response::json([
                            'message' => _('Password has been changed.') 
                        ]);
                    }
                }
            }
            else
            {
                return redirect('auth/login');
            }
        }
        else
        {
            return \Response::json([
                'message' => _('Bad Request.')
            ],'400');
        }
    }
}

?>
