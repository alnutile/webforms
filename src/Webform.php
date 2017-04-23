<?php


namespace Alnutile\Webforms;


use Illuminate\Database\Eloquent\Model;

class Webform extends Model
{


    protected $fillable = [
        'data',
        'name'
    ];

    protected $casts = [
        'data' => 'json'
    ];

}