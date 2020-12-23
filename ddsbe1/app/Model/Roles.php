<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
    {
        
        public $timestamps = false;
        
        //name of the table
        protected $table = 'roles';
        // column sa table
        protected $fillable = [
            'name'
        ];
        
        protected $primaryKey = 'roleid';
    }

?>