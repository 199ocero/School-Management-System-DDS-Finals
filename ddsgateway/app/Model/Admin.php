<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
    {
        
        public $timestamps = false;
        
        //name of the table
        protected $table = 'admin';
        // column sa table
        protected $fillable = [
            'id','fname','lname','email','api_token'
        ];
        public $incrementing = false;
        protected $primaryKey = 'id';
        protected $hidden = ['password'];
    }

?>