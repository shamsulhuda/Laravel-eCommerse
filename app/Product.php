<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $filable = [
        'name', 'image', 'price', 'description'
    ];
}
