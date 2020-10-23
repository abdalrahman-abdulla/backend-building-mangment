<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class revenuesResource extends JsonResource
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
            'building_no' => $this->building['building_no'],
            'client_name' => $this->building['client_name'],
            'amount_paid' => $this->amount_paid,
            'paid_date' => $this->paid_date,
            'payment_name' => $this->payment_name
            
             
        ];
    }
}
