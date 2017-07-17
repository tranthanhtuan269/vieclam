<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'number', 'expiration_date', 'work_time', 'public', 'description', 'required', 'benefit', 'city', 'district', 'position', 'experience', 'work_type', 'job_type', 'salary', 'gender', 'age', 'company'];

    
}
