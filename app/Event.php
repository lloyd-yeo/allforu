<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Event extends Model
{
    use CanBeLiked, CanBeFollowed;
}
