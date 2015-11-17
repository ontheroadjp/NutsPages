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
        return view('NutsPages::dashboard', compact('user'));
    }

    /**
     * Create a new usersite instance.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $site = UserSite::create([
            'site_name' => \Auth::user()->name."'s Site",
            'hash' => sha1(uniqid(rand(),true)),    // 40文字
        ]);

        return view('NutsPages::newsite');
    }

}
?>