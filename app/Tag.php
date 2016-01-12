<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
     * fillable fields for a tag.
     * 
     * @var array
     */
     
    protected $fillable = array('name');
    
    /**
     * Get the articles associated with the given tag.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
     
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
