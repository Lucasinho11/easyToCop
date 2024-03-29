<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drops extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'label',
        'dropTime',
        'img',
        'price',
        'img_id'
    ];
}
