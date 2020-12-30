<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'college';
    // column sa table
    protected $fillable = [
        'id','name','code','date'
    ];
    
    protected $primaryKey = 'id';
}
