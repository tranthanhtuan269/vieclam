<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follow';
    public $timestamps = false;

    protected $fillable = [
			'user', 'company'
    	];
}
