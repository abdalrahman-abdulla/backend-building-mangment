<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    protected $fillable = [
        'client_name','building_no','building_price','client_phone','delivery_date','loan_date','loan_receiving_date','loan_price','notice'
    ];
     
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
