<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Package extends Model
{
    //
    protected $fillable=['name','no_station','no_orderPerMonth','no_orderFree','orderPrice','subscribePrice'];
    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }
}
