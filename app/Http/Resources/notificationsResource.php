<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class notificationsResource extends JsonResource
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
            'work_stage' => $this->work_stage,
            'payment_date' => $this->payment_date,
            'payment_money' => $this->payment_money,
            'payment_name' => $this->payment_name
            
            
             
        ];
    }
}
