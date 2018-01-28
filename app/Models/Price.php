<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = "prices";
    protected  $primaryKey = "id";

    protected $fillable = [
        'products_id',
        'price'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
