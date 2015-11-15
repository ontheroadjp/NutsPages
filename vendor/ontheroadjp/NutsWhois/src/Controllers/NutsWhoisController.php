<?php

namespace Ontheroadjp\NutsWhois\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Ontheroadjp\NutsWhois\Services\Whois;

class NutsWhoisController extends Controller
{

    /**
     * Show the form for Domain Search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('NutsWhois::search');
    }

    public function result(Request $req)
    {
        if($req->ajax()){

            $inputValue = $req->input('val','no-val');

            // $targets = [
            //     'com','net','org','asia','jp','cn'
            // ];

            $domains = [
                        'title' => _('Search result'),
                'domains' => [    
                    [
                        'name' => 'com',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ],
                    [
                        'name' => 'net',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ],
                    [
                        'name' => 'org',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ],
                    [
                        'name' => 'asia',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ],
                    [
                        'name' => 'jp',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ],
                    [
                        'name' => 'cn',
                        'available' => 'false',
                        'message' => _('is not available'),
                        'btnLabel' => _('select')
                    ]
                ]
            ];


            for( $n=0; $n<count($domains['domains']); $n++ ) {
                $whois = new Whois($inputValue.'.'.$domains['domains'][$n]['name']);
                if ($whois->isAvailable()) {
                    $domains['domains'][$n]['available'] = 'true';
                    $domains['domains'][$n]['message'] = _('is available');
                }
            }

            return \Response::json($domains);

        } else {
           return \Response::json(["message" => "NG"]);
        }
        // if($req->ajax()){

        //     $params = $req->all();
        //     $result = \DB::table('users')->where('id', $params['id'])->update([
        //         $params['field'] => $params['val']
        //     ]);

        //     if($result === 1){

        //         if($params['field'] === 'name') {
        //             $msg = _('User name has been changed Successfully.');
        //         } elseif($params['field'] === 'email') {
        //             $msg = _('E-mail address has been changed Successfully.');
        //         }

        //         $msg = '<i class="fa fa-check-circle-o"></i> ' . _('Success Saved!');

        //         return \Response::json([
        //             'message' => $msg,
        //             'result' => $result,
        //         ]);

        //     } else {
        //         http_response_code(400);
        //         return \Response::json([
        //             'message' => _('DB update failed.')
        //         ]);

        //     }

        // } else {
        //     http_response_code(400);
        //     return \Response::json([
        //         'message' => _('Bad Request.')
        //     ]);
        // }
    }
}
?>