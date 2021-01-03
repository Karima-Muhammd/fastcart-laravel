<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Ticket extends Model
{
    protected $fillable=['name','order','phone'];
}
