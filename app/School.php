<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School
 *
 * @package App
 * @property string $name
 * @property string $acronym
 * @property string $cover_img
*/
class School extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'acronym', 'cover_img'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        School::observe(new \App\Observers\UserActionsObserver);
    }
    
}
