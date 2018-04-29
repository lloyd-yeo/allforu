<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Club
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $website
 * @property string $fb_page_url
 * @property string $ig_page_url
 * @property string $cover_img
 * @property string $school
*/
class Club extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['name', 'description', 'website', 'fb_page_url', 'ig_page_url', 'cover_img', 'school_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Club::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSchoolIdAttribute($input)
    {
        $this->attributes['school_id'] = $input ? $input : null;
    }
    
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id')->withTrashed();
    }
    
}
