<?php

namespace Ontheroadjp\NutsPages\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $sites = \DB::table('user_sites')
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
        $count = \DB::table('user_sites')->where('user_id',$user->id)->count();
        $subdomain = $user->name."-".++$count;

        $site = UserSite::create([
            'id' => \Uuid::generate(4),
            'user_id' => $user->id,
            'site_name' => $subdomain._("'s Site"),
            'subdomain' => str_random(6),
            'hash' => sha1(uniqid(rand(),true)),    // 40文字
        ]);
        // return redirect()->route('dashboard.show');
        return view('NutsPages::newsite');
    }

    public function siteDelete(Request $req, $hash)
    {
        if($req->ajax()){
            $site = UserSite::where('hash','=',$hash);
            if($site->delete()){
                return \Response::json([
                    'message' => $hash,
                    'result' => 'OK',
                ]);
            } else {
                http_response_code(400);
                return \Response::json([
                    'message' => _('User site delete failed.'),
                    'result' => _('Failed'),
                ]);
            }
        } else {
            http_response_code(400);
            return \Response::json([
                'message' => _('Bad Request.'),
                'result' => _('Failed'),
            ]);
        }
    }

}
?>