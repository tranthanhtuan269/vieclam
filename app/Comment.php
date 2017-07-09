<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false;

    protected $fillable = [
			'title', 'description', 'star', 'company', 'created_by', 'created_at'
    	];
}
