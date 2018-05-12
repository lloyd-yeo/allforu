<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanBeSubscribed;
use Carbon\Carbon;

/**
 * Class Event
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $cover_img
 * @property string $school
 * @property string $start_date
 * @property string $end_date
 */
class Event extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, CanBeLiked, CanBeFollowed, CanBeSubscribed;

    protected $fillable = [
        'name',
        'description',
        'cover_img',
        'start_date',
        'end_date',
        'public',
        'address_description',
        'address',
        'peak_period',
        'participants',
        'itinerary',
        'notes',
        'free',
        'require_sponsorships',
        'require_snacks_sponsorship',
        'require_stationary_sponsorship',
        'require_facial_sponsorship',
        'require_cash_sponsorship',
        'require_shirt_vendor',
        'require_food_vendor',
        'require_games_vendor',
        'sponsor_fulfillment_display_poster',
        'sponsor_fulfillment_display_standees',
        'sponsor_fulfillment_display_tv',
        'sponsor_fulfillment_fb_likeandshare',
        'sponsor_fulfillment_fb_review',
        'sponsor_fulfillment_ig',
        'sponsor_fulfillment_google',
        'sponsor_fulfillment_afu',
        'sponsor_fulfillment_booth',
        'club_id'];

    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        Event::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setClubIdAttribute($input)
    {
        $this->attributes['club_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['start_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['end_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['end_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
