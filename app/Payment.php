<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    

    protected $fillable = [
        'payment_name','work_stage','payment_money','payment_date','completion_payment_date','penultimate_payment_date','loan_receiving_date','loan_price','notice','building_id'
    ];

    public function building()
    {
        return $this->belongsTo('App\building');
    }


}
