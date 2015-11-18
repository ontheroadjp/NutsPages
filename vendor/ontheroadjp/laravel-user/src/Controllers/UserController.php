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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
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
        return view('LaravelUser::profile', compact('user','history'));
    }

    public function edit(Request $req)
    {
        $this->validate( $req, [
            'id' => 'required',
            'field' => 'required',
            'val' => 'required'
        ]);

        if($req->ajax()){

            $params = $req->all();
            $user = Auth::user();
            $user->setAttribute( $params['field'], $params['val'] );
            if( $user->save() ) {

                $msg = [
                    'name' => _('User name has been changed Successfully.'),
                    'email' => _('E-mail address has been changed Successfully.'),
                ];

                if( $params['field'] === 'name' ){
                    Activity::updatedUserName($user->id);
                } elseif( $params['field'] === 'email' ) {
                    Activity::updatedEmailAddress($user->id);
                }

                return \Response::json([
                    'message' => $msg[$params['field']]
                ]);

            } else {
                http_response_code(400);
                return \Response::json([
                    'message' => _('DB update failed.')
                ]);
            }

        } else {
            http_response_code(400);
            return \Response::json([
                'message' => _('Bad Request.')
            ]);
        }
    }
}
?>