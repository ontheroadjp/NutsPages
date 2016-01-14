<?php

namespace Ontheroadjp\LaravelUser\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

class UserController extends Controller
{
    /**
     * ユーザー名/E-mail アドレス/パスワード変更用フォームの表示
     *
     * @param  int  $id 変更対象のユーザー ID
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \DB::table('users')->where('id',\Auth::user()->id)->first();
        $history = \DB::table('user_activities')
            ->join('users', 'user_activities.user_id', '=', 'users.id')
            ->join('activity_master', 'user_activities.activity_id', '=', 'activity_master.id')
            ->select(
                'user_activities.message',
                'user_activities.created_at',
                'user_activities.message',
                'activity_master.activity'
            )
            ->where('user_id', \Auth::user()->id)
            ->orderBy('user_activities.created_at','desc')
            ->get();
        return view('LaravelUser::index', compact('user','history'));
    }

    /**
     * [AJAX] ユーザー名/Email アドレスの変更処理 
     * 
     * @param Request $req 
     * @access public
     * @return json
     */
    public function edit(Request $req)
    {
        if($req->ajax())
        {
            $params = $req->all();

            $rules = [
                'name' => [
                    'id' => 'required',
                    'field' => 'required',
                    'val' => 'required'
                ],
                'email' => [
                    'id' => 'required',
                    'field' => 'required',
                    'val' => 'required|email'
                ],
            ];
            $this->validate($req, $rules[$params['field']]);
            $user = Auth::user();
            $user->setAttribute($params['field'], $params['val']);
            if($user->save())
            {
                $msg = [
                    'name' => _('User name has been changed Successfully.'),
                    'email' => _('E-mail address has been changed Successfully.'),
                ];

                return \Response::json([
                    'message' => $msg[$params['field']]
                ],'200');
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
