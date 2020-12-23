<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
    {
        
        public $timestamps = false;
        
        //name of the table
        protected $table = 'users';
        // column sa table
        protected $fillable = [
            'username','password','roleid'
        ];
        
        protected $primaryKey = 'id';
        protected $hidden = ['password'];
    }

?>