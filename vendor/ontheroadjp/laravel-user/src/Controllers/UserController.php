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

    // public function changeLang($locale=null){
    //     LaravelGettext::setLocale($locale);
    //     return Redirect::to(URL::previous());
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $user = \DB::table('users')->where('id',\Auth::user()->id)->first();
        return view('LaravelUser::profile', compact('user'));
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
            // $result = \DB::table('users')->where('id', $params['id'])->update([
            //     $params['field'] => $params['val']
            // ]);

            $user = Auth::user();
            $user->setAttribute( $params['field'], $params['val'] );
            if( $user->save() ) {


            // if($result === 1){

                $msg = [
                    'name' => _('User name has been changed Successfully.'),
                    'email' => _('E-mail address has been changed Successfully.'),
                ];

                return \Response::json([
                    'message' => $msg[$params['field']],
                    'result' => 'OK',
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