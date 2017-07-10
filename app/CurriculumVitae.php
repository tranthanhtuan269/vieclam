<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    protected $table = 'curriculumvitae';
    // public $timestamps = false;

    protected $fillable = [
			'id',
			'user_id',
			'birthday',
			'birthmonth',
			'birthyear',
			'gender',
			'address',
			'city_id',
			'district_id',
			'education',
			'experience',
			'language',
			'skills',
			'interests',
			'computer',
			'career_objective',
			'description',
			'images',
			'avatar'
    	];
}
