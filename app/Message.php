<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Message extends Model
{
    protected $fillable=['name','email','phone','message'];
}
