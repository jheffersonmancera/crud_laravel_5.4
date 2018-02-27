<?php

namespace Rimorsoft;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'short', 'body',//*1 *2Product
    ];
}
