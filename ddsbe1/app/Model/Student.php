<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'student';
    // column sa table
    protected $fillable = [
        'id','fname','mname','lname','age','birth_of_date','address'
    ];
    
    protected $primaryKey = 'id';
}
