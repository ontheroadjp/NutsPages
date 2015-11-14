<?php

namespace Ontheroadjp\LaravelUser\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


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
        // if( $id !== \Auth::user()->id ) {
        //     \App::abort('403');
        // }
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
            $result = \DB::table('users')->where('id', $params['id'])->update([
                $params['field'] => $params['val']
            ]);

            if($result === 1){

                if($params['field'] === 'name') {
                    $msg = _('User name has been changed Successfully.');
                } elseif($params['field'] === 'email') {
                    $msg = _('E-mail address has been changed Successfully.');
                }

                $msg = '<i class="fa fa-check-circle-o"></i> ' . _('Success Saved!');

                return \Response::json([
                    'message' => $msg,
                    'result' => $result,
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