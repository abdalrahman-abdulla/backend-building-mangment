<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class paymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'id' => $this->id,
            'building_id' => $this->building_id,
            'work_stage' => $this->work_stage,
            'payment_date' => $this->payment_date,
            'payment_money' => $this->payment_money,
            'payment_name' => $this->payment_name,
            'amount_paid' => $this->amount_paid,
            'paid_date' => $this->paid_date,
            'completion_payment_date' => $this->completion_payment_date,
            'penultimate_payment_date' => $this->penultimate_payment_date
            
            
             
        ];
    }
}
