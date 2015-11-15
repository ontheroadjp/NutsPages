<?php 

namespace Ontheroadjp\LaravelImageGallery\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image;
// use App\User;
use Ontheroadjp\LaravelImageGallery\Models\ExUser;


class LaravelImageGalleryController extends \Illuminate\Routing\Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function upload(Request $request, $type = 'default')
    {
        // Get the configuration
        $config = \Config::get('laravel-img-gallery');
        $configType = \Config::get('laravel-img-gallery.types.'.$type);

        if ( ! $configType )
        {
            return [ 'error' => 'type-not-found' ];
        }

        // Check if file is uploaded
        if ( ! \Input::hasFile('file') )
        {
            return [ 'error' => 'file-not-found' ];
        }


        // -------------------------------------------------
        // for ontheroadjp/laravel-img-gallery
        // github: https://github.com/triasrahman/laravel-media-upload
        $file = \Input::file('file');

        // get file size in Bytes
        $file_size = $file->getSize();

        // Check the file size
        if ( $file_size > $config['max_size'] * 1024 || ( isset($configType['max_size']) && $file_size > $configType['max_size'] * 1024 ) )
        {
            return [ 'error' => 'limit-size' ];
        }

        // get the extension
        $ext = strtolower( $file->getClientOriginalExtension() );

        // checking file format
        $format = $this->getFileFormat($ext);

        // TODO: check file format
        if( isset($configType['format']) && ! in_array($format, explode('|', $configType['format'])) )
        {
            return [ 'error' => 'invalid-format' ];
        }

        // saving file
        $filename = date('U').str_random(10);
        $file->move(public_path().'/'.$config['dir'].'/'.$type, $filename.'.'.$ext);
        // // $file->move(base_path('users/').Auth::user()->id.'/'.$config['dir'].'/'.$type, $filename.'.'.$ext);

        $file_path = $config['dir'].'/'.$type.'/'.$filename.'.'.$ext;


        // -------------------------------------------------
        // for spatie/laravel-medialibrary
        // http://medialibrary.spatie.be/
        // github: https://github.com/spatie/laravel-medialibrary/tree/master/src
        $usermodel = ExUser::find($request->user()->id);
        // $usermodel->addMedia(\Input::file('file'))
        $usermodel->addMedia($file_path)
            ->preservingOriginal()
            ->toMediaLibrary();


        // -------------------------------------------------
        // for Intervention/image
        // http://image.intervention.io/
        // github: https://github.com/Intervention/image
        if ( $format == 'image' && isset($config['types'][$type]['image']) && count($config['types'][$type]['image']) )
        {

            $img = \Image::make(public_path().'/'.$file_path);

            foreach($config['types'][$type]['image'] as $task => $params)
            {
                switch($task) {
                    case 'resize':
                        $img->resize($params[0], $params[1]);
                        break;
                    case 'fit':
                        $img->fit($params[0], $params[1]);
                        break;
                    case 'crop':
                        $img->crop($params[0], $params[1]);
                        break;
                    case 'thumbs':
                        // $img->save();
                        foreach($params as $name => $sizes) {
                            $img->backup();
                            $thumb_path = $config['dir'].'/'.$filename.'-'.$name.'.'.$ext;
                            // $img->fit($sizes[0], $sizes[1])->save($thumb_path);
                            $img->resize($sizes[0], $sizes[1])->save($thumb_path);
                            $img->reset();
                        }
                        break;
                }
            }
            // $img->save();
        }

        return [
            'original' => [
                'name' => $file->getClientOriginalName(),
                'size' => $file_size,
            ],
            'ext' => $ext,
            'format' => $format,
            // 'image' => [
            //     'size' =>$img->getSize(),
            // ],
            'name' => $filename,
            'path' => $file_path,
        ];

    }

    protected function getFileFormat($ext) {
        if ( preg_match('/(jpg|jpeg|gif|png)/', $ext) )
        {
            return 'image';
        }
        elseif( preg_match( '/(mp3|wav|ogg)/', $ext) )
        {
            return 'audio';
        }
        elseif( preg_match( '/(mp4|wmv|flv)/', $ext) )
        {
            return 'video';
        }
        elseif( preg_match('/txt/', $ext) )
        {
            return 'text';
        }
        
        return 'other';
    }

}
