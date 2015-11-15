<?php
namespace Ontheroadjp\LaravelImageGallery\Models;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
// use Illuminate\Database\Eloquent\Model;
use App\User;

class ExUser extends User implements HasMedia
{
    use HasMediaTrait;

    // protected $table = 'users';
    
   //...
}
?>
