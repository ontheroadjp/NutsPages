<?php

namespace Ontheroadjp\NutsPages\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

use Ontheroadjp\NutsPages\Models\UserSite;

class NutsPagesController extends Controller
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
    public function dashboard()
    {
        // $user = \DB::table('users')->where('id',\Auth::user()->id)->first();
        $user = \Auth::user();
        $sites = DB::table('user_sites')
            ->where('user_id',$user->id)
            ->where('deleted_at',null)
            ->get();

        // $sites = \Auth::user()->user_sites();
        return view('NutsPages::dashboard', compact('user','sites'));
    }

    /**
     * Create a new usersite instance.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
        $user = \Auth::user();
        $count = DB::table('user_sites')->where('user_id',$user->id)->count();
        $subdomain = $user->name."-".++$count;

        try {
            $site = UserSite::create([
                'id' => \Uuid::generate(4),
                'user_id' => $user->id,
                'site_name' => $subdomain._("'s Site"),
                'subdomain' => str_random(6),
                'hash' => sha1(uniqid(rand(),true)),    // 40文字長
            ]);
        } catch( Exception $e ) {
            return redirect()->route('dashboard.show');
        }

        return view('NutsPages::newsite');
    }

    public function delete(Request $req, $hash)
    {
        try {
            if($req->ajax()){
                $site = UserSite::where('hash','=',$hash)->first();
                if($site->delete()){
                    return \Response::json([
                        'message' => $hash,
                        'result' => 'OK',
                    ]);
                } else {
                    http_response_code(400);
                    $msg = _('DB::delete() failed.');
                    \Session::flash('alert_danger', $msg);
                    return \Response::json([
                        'message' => $msg,
                        'result' => _('Failed'),
                    ]);
                }
            } else {
                http_response_code(400);
                $msg = _('Bad Request.');
                \Session::flash('alert_danger', $msg);
                return \Response::json([
                    'message' => $msg,
                    'result' => _('Failed'),
                ]);
            }
        } catch( \Exception $e) {
            http_response_code(400);
            $msg = $e->getMessage();
            \Session::flash('alert_danger', $msg);
            return \Response::json([
                'message' => $msg,
                'result' => _('Failed'),
            ]);
        }
    }

    public function publish(Request $req, $hash)
    {
        if($req->ajax()){
            if(UserSite::where('hash','=',$hash)->update(['published'=>1])){
                return \Response::json([
                    'message' => $hash,
                    'result' => 'OK',
                ]);
            }

        }
    }


}
?>