<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    // public $timestamps = false;

    protected $fillable = [
			'name', 'sub_name', 'tax_number', 'sologan', 'hotline', 'size', 'job_type', 'city_id', 'district_id', 'address', 'description', 'logo', 'banner', 'images', 'company_type', 'created_by', 'created_at', 'updated_by', 'updated_at'
    	];
}
