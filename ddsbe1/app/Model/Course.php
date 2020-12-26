<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'course';
    // column sa table
    protected $fillable = [
        'id','name','code','date'
    ];
    
    protected $primaryKey = 'id';
}
