<?php

namespace Ontheroadjp\NutsPages\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

use Ontheroadjp\NutsPages\Models\UserSite;
use Ontheroadjp\Utilities\Exceptions\AjaxExceptionHandler;

class NutsPagesController extends Controller
{
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

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'hash' => 'required',
            // 'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new usersite instance.
     *
     * @param  array  $data
     * @return User
     */
    public function create()
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
        return view('NutsPages::newsite',compact('site'));
    }


    public function delete(Request $req, $hash)
    {
        //try {
            //if($req->ajax()){
            if($req->ajax() || $req->wantsJson()){
                $site = UserSite::where('hash','=',$hash)->first();
                if($site !== null) {
                    if($site->delete()){
                        return \Response::json([
                            'message' => $hash,
                            'result' => 'OK',
                        ]);
                    } else {
                        $msg = _('DB::delete() failed.');
                        \Session::flash('alert_danger', $msg);
                        return \Response::json([
                            'message' => $msg,
                            'result' => _('Failed'),
                        ]);
                    }
               } else {
                    $msg = _('does not exist $site.');
                    \Session::flash('alert_danger', $msg);
                    return \Response::json([
                        'message' => $msg,
                        'result' => _('Failed'),
                    ]);                    
                }
            } else {
                $msg = _('Bad Request.');
                \Session::flash('alert_danger', $msg);
                return \Response::json([
                    'message' => $msg,
                    'result' => _('Failed'),
                ],'400');
            }
        //} catch( \Exception $e) {
        //    $msg = $e->getMessage();
        //    \Session::flash('alert_danger', $msg);
        //    return \Response::json([
        //        'message' => $msg,
        //        'result' => _('Failed'),
        //    ],'500');
        //}
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
