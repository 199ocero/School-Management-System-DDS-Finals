<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentRole extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'student_role';
    // column sa table
    protected $fillable = [
        'id','student_id','subject_id','section','date'
    ];
    
    protected $primaryKey = 'id';
}
