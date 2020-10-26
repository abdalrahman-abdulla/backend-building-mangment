<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    
    protected $fillable = [
        'name','statistics','buildings','revenues','work_stages','money','notifications','user_id'
    ];
 
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    
}
