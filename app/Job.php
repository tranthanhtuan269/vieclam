<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $table = 'job';
    // public $timestamps = false;

    protected $fillable = [
    	'name', 'number', 'expiration_date', 'work_time', 'public', 'description', 'required', 'benefit', 'city_id', 'district_id', 'position_id', 'experience', 'work_type', 'job_type', 'salary', 'gender', 'age', 'company_id', 'created_by', 'created_at', 'updated_by', 'updated_at'
    ];
}
