<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'subject';
    // column sa table
    protected $fillable = [
        'id','name','code','year','semester','instructor','course','college','date'
    ];
    
    protected $primaryKey = 'id';
}
