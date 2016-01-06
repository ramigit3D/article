<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =[
        'name',
        'slug',
        'permissions'
    ];
    
    public function user()
    {
        return $this-> belongsToMany('App\User')->withTimestamps();
    }
}
