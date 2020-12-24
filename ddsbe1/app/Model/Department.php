<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'department';
    // column sa table
    protected $fillable = [
        'id','name','date'
    ];
    
    protected $primaryKey = 'id';
}
