<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class permissionResource extends JsonResource
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
            
            'permission_name' => $this->name,
            'statistics' => $this->statistics,
            'users' => $this->users,
            'buildings' => $this->buildings,
            'revenues' => $this->revenues,
            'money' => $this->money,
            'work_stages' => $this->work_stages,
            'notifications' => $this->notifications,
            
             
            
             
        ];

    }
}
