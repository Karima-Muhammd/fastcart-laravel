<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static create(array $array)
 */
class Subscriber extends  Authenticatable
{
    //
    protected $guard = 'subscriber';

    protected $fillable=['name','status','password','end_date','email','phone','street','no_flat','no_flour','no_build','package_id'];
    public function package()
    {
        return $this->belongsTo('App\Package','package_id');
    }
}


