<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class buildingResource extends JsonResource
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
            'client_name' => $this->client_name,
            'building_price' => $this->building_price,
            'building_no' => $this->building_no,
            'client_phone' => $this->client_phone,
            'delivery_date' => $this->delivery_date,
            'loan_date' => $this->loan_date,
            'loan_receiving_date' => $this->loan_receiving_date,
            'loan_price' => $this->loan_price,
            'notice' => $this->notice,
            'created_at' => $this->created_at
            
            
             
        ];
    }
}
