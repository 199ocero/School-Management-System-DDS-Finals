<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    //name of the table
    protected $table = 'section';
    // column sa table
    protected $fillable = [
        'id','name','date'
    ];
    
    protected $primaryKey = 'id';
}
